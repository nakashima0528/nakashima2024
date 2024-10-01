<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CreateInvoiceRequest;
use App\Http\Requests\UpdateInvoiceRequest;
use App\Mail\SystemMail;
use App\Models\PaymentStripe;
use App\Repositories\InvoiceRepository;
use Auth;
use DateTime;
use Flash;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Response;

class InvoiceController extends AppBaseController
{
	/** @var InvoiceRepository $invoiceRepository*/
	private $invoiceRepository;

	public function __construct(InvoiceRepository $invoiceRepo)
	{
		$this->invoiceRepository = $invoiceRepo;
	}

	/**
	 * Display a listing of the Invoice.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$invoices = $this->invoiceRepository->all()->sortByDesc("id");

		return view('admin.invoices.index')
			->with('invoices', $invoices);
	}

	/**
	 * Show the form for creating a new Invoice.
	 *
	 * @return Response
	 */
	public function create($user_id)
	{
		$user = $this->invoiceRepository->findUser($user_id);
		return view('admin.invoices.create')->with('user', $user);
	}

	/**
	 * Store a newly created Invoice in storage.
	 *
	 * @param CreateInvoiceRequest $request
	 *
	 * @return Response
	 */
	public function store(CreateInvoiceRequest $request)
	{
		$input = $request->all();

		$invoice = $this->invoiceRepository->create($input);

		Flash::success('Invoice saved successfully.');

		return redirect(route('invoices.show',$invoice->id));
	}

	/**
	 * Display the specified Invoice.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function show($id)
	{
		$invoice = $this->invoiceRepository->find($id);
		$user = $this->invoiceRepository->findUser($invoice->user_id);
		if (empty($user)) {
			Flash::error('User not found');

			return redirect(route('invoices.index'));
		}
		$invoiceDetails = $this->invoiceRepository->getInvoiceDetail($id); 

		if (empty($invoice)) {
			Flash::error('Invoice not found');

			return redirect(route('invoices.index'));
		}

		return view('admin.invoices.show')->with('invoice', $invoice)
										  ->with('user', $user)
										  ->with('invoiceDetails', $invoiceDetails);
	}

	/**
	 * Show the form for editing the specified Invoice.
	 *
	 * @param int $id
	 *
	 * @return Response
	 */
	public function edit($id)
	{
		$invoice = $this->invoiceRepository->find($id);
		if (empty($invoice)) {
			Flash::error('Invoice not found');

			return redirect(route('invoices.index'));
		}
		$user = $this->invoiceRepository->findUser($invoice->user_id);
		if (empty($user)) {
			Flash::error('User not found');

			return redirect(route('invoices.index'));
		}

		return view('admin.invoices.edit')->with('invoice', $invoice)
										  ->with('user', $user);
	}

	/**
	 * Update the specified Invoice in storage.
	 *
	 * @param int $id
	 * @param UpdateInvoiceRequest $request
	 *
	 * @return Response
	 */
	public function update($id, UpdateInvoiceRequest $request)
	{
		$invoice = $this->invoiceRepository->find($id);

		if (empty($invoice)) {
			Flash::error('Invoice not found');

			return redirect(route('invoices.index'));
		}

		$invoice = $this->invoiceRepository->update($request->all(), $id);

		Flash::success('Invoice updated successfully.');

		return redirect(route('invoices.show',$id));
	}

	/**
	 * Remove the specified Invoice from storage.
	 *
	 * @param int $id
	 *
	 * @throws \Exception
	 *
	 * @return Response
	 */
	public function destroy($id)
	{
		$invoice = $this->invoiceRepository->find($id);

		if (empty($invoice)) {
			Flash::error('Invoice not found');

			return redirect(route('invoices.index'));
		}

		$this->invoiceRepository->delete($id);

		Flash::success('Invoice deleted successfully.');

		return redirect(route('users.show', [$invoice->user_id]));
	}

	/**
	 * Store a newly created Invoice in storage.
	 *
	 * @return Response
	 */
	public function autoCreateParcelInvoce($user_id,$parcel_id)
	{
		$invoice = $this->invoiceRepository->autoCreateParcelInvoce($user_id,$parcel_id);

		Flash::success('Invoice saved successfully.');
	
		return redirect(route('parcels.show', [$parcel_id]));
	}


	/**
	 * Home -- Show the PAYMENT CHECKOUT.
	 */
	public function invoices()
	{
		$user = Auth::user();

		$invoices = $this->invoiceRepository->getInvoicePaginate($user->id);

		return view('home.invoices.index')->with('invoices',$invoices);
	}
  
	/**
	 * Home -- Show the PAYMENT CHECKOUT.
	 */
	public function invoicesUnpaid()
	{
		$user = Auth::user();

		$invoices = $this->invoiceRepository->getInvoicePaginate($user->id,[config('const.invoice.status.PENDING'),config('const.invoice.status.WISE')]);

		return view('home.invoices.index')->with('invoices',$invoices);
	}
  
	/**
	 * Home -- Display the specified Invoice.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function showInvoice(Request $request)
	{
		$user = Auth::user();

		$invoice = $this->invoiceRepository->find($request->id);
		if (empty($invoice)) {
			\Session::flash('flash_error', 'Invoice not found.');
			return redirect(route('home.invoices'));
		}
		$parcel = $this->invoiceRepository->findParcel($invoice->parcel_id);
		if ($invoice->parcel_id && empty($parcel)) {
			\Session::flash('flash_error', 'Parcel not found.');
			return redirect(route('home.invoices'));
		}

		return view('home.invoices.show')->with('invoice', $invoice)
										 ->with('parcel', $parcel);
	}

	/**
	 * Home -- PAYMENT CHECKOUT select
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function select(Request $request)
	{
		$invoice = $this->invoiceRepository->find($request->id);

		if (empty($invoice)) {
			\Session::flash('flash_error', 'Invoice not found.');
			return redirect(route('home.invoices'));
		}

		$user = Auth::user();

		$defaultCard = PaymentStripe::getDefaultcard($user);

		$client_secret = null;

		if($defaultCard){
			// 請求金額
			$amount = Helper::getTotlePayment($invoice->invoiceDetails);
      // 3Dセキュア対応
			\Stripe\Stripe::setApiKey(\Config::get('const.stripe_secret_key'));
			$paymentMethods = \Stripe\PaymentMethod::all(['customer' => $user->stripe_id, 'type' => 'card']);
			$payment_method = null;
			foreach($paymentMethods as $paymentMethod){
				$payment_method = $paymentMethod->id;
			}
			$intent = \Stripe\PaymentIntent::create([
				'amount'   => $amount,
				'currency' => 'jpy',
				'payment_method' => $payment_method,
				'customer' => $user->stripe_id,
				'description' => 'Invoice #'.$invoice->id,
				'expand[]' => 'payment_method',
			]);
			$client_secret = $intent->client_secret;
//			Log::info("intent ".$intent);
		}

		return view('home.invoices.select', compact('invoice','defaultCard','client_secret'));
	}

	/**
	 * Home -- PAYMENT CHECKOUT proceed
	 */
	public function proceed(Request $request)
	{
		$invoice = $this->invoiceRepository->find($request->id);

		if (empty($invoice)) {
			\Session::flash('flash_error', 'Invoice not found.');
			return redirect(route('home.invoices'));
		}
		if ($invoice->status != config('const.invoice.status.PENDING')) {
			\Session::flash('flash_error', 'Invoice invalid.');
			return redirect(route('home.invoices'));
		}

		// Wise支払い
		if($request->method == config('const.invoice.method.WISE')){
			$invoice->status = config('const.invoice.status.WISE');
			$invoice->method = config('const.invoice.method.WISE');
			$invoice->save();

			// SCSの場合Parcelも更新
			if($invoice->type == config('const.invoice.type.SCS')){
				$percel = $this->invoiceRepository->findParcel($invoice->parcel_id);
				$percel->status = config('const.parcel.status.PROCESSING');
				$percel->save();
			}

			return view('home.invoices.wise.success', compact('invoice'));

			// Stripe支払い
		} else {

      // エラーが発生している場合
      if($request->error_message){
        \Session::flash('flash_error', $request->error_message);
        return redirect(route('home.payment'));
      }

			if($this->payCC($invoice,$request->payment_id)){
				return view('home.invoices.cc.success', compact('invoice'));
			}else{
				return redirect(route('home.payment'));
			}
		}

		\Session::flash('flash_error', 'No payment method specified.');
		return redirect(route('home.invoices'));
	}

	/**
	 * Home -- PAYMENT METHOD STRIPE pay
	 */
	private function payCC($invoice,$payment_id){

		\Stripe\Stripe::setApiKey(\Config::get('const.stripe_secret_key'));
		// 請求金額
		$amount = Helper::getTotlePayment($invoice->invoiceDetails);

		if($payment_id){

      // 請求情報更新
			$invoice->status = config('const.invoice.status.PAID');
			$invoice->method = config('const.invoice.method.STRIPE');
			$invoice->paid = new DateTime();
      $invoice->notes .= ' Stripe PaymentIntent id : ' . $payment_id;
			$invoice->save();

			// SCSの場合Parcelも更新
			if($invoice->type == config('const.invoice.type.SCS')){
				$parcel = $this->invoiceRepository->findParcel($invoice->parcel_id);
				$parcel->status = config('const.parcel.status.PROCESSING');
				$parcel->save();
			}

			// 運営にメール通知
			$data = [
				'user' => Auth::user(),
				'invoice' => $invoice
			];
			Mail::to(config('const.mail.to'))->send(new SystemMail(config('const.mail.type.PAID'),$data));

		} else {
      \Session::flash('flash_error', 'Payment failed. Please contact support.');
			return false;
		}
		return true;
	}


	/**
	 * Admin -- Show the Invoice CSV.
	 */
	public function csvInvoice()
	{
		return view('admin.invoices.csv');
	}

	/**
	 * Admin -- Download Invoice CSV.
	 *
	 * @param Request $request
	 *
	 * @return Response
	 */
	public function csvInvoiceDownload(Request $request)
	{
		$query = \App\Models\Invoice::where('id','>','0');

		if($request->status != ''){
			$query->where('status',$request->status);
		}
		if($request->id != ''){
			$query->where('id',$request->id);
		}
		if($request->user_id != ''){
			$user_id = str_replace('JP', '', $request->user_id);;
			$query->where('user_id',$user_id);
		}
		if($request->created_from != ''){
			$query->whereDate('created_at', '>=',$request->created_from);
		}
		if($request->created_to != ''){
			$query->whereDate('created_at', '<=',$request->created_to);
		}

		$invoices = $query->orderBy('id');

		// コールバック関数に１行ずつ書き込んでいく処理を記述
		$callback = function () use ($invoices) {
			// 出力バッファをopen
			$stream = fopen('php://output', 'w');
			// 文字コードをShift-JISに変換
//            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');
			// ヘッダー行
			fputcsv($stream, [
				'#',
				'status',
				'user_id',
				'type',
				'parcel_id',
				'method',
				'issued',
				'paid',
				'notes',
				'payment',
				'detail_type',
				'detail_name',
				'detail_value',
				'detail repeat ...',
			]);

			// ２行目以降の出力
			// cursor()メソッドで１レコードずつストリームに流す処理を実現できる。
			foreach ($invoices->cursor() as $invoice) {

				$row = [];
				$row[] = $invoice->id;
				$row[] = config('const.invoice.status_list.'.$invoice->status);
				$row[] = 'JP'.$invoice->user_id;
				$row[] = config('const.invoice.type_list.'.$invoice->type);
				$row[] = $invoice->parcel_id;
				$row[] = config('const.invoice.method_list.'.$invoice->method);
				$row[] = $invoice->issued;
				$row[] = $invoice->paid;
				$row[] = $invoice->notes;
				if(isset($invoice->invoiceDetails)){
					$row[] = Helper::getTotlePayment($invoice->invoiceDetails);
					foreach($invoice->invoiceDetails as $invoiceDetail){
						$row[] = config('const.invoice_details.type_list.'.$invoiceDetail->type);
						$row[] = $invoiceDetail->name;
						$row[] = $invoiceDetail->value;
					}
				}else{
					$row[] = 0;
				}


				fputcsv($stream, $row);
			}
			fclose($stream);
		};
		
		// 保存するファイル名
		$filename = sprintf('invoice-%s.csv', date('YmdHis'));
		
		// ファイルダウンロードさせるために、ヘッダー出力を調整
		$header = [
			'Content-Type' => 'application/octet-stream',
		];
		
		return response()->streamDownload($callback, $filename, $header);

	}
}
