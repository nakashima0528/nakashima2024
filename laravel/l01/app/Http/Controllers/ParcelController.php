<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateParcelRequest;
use App\Http\Requests\UpdateParcelRequest;
use App\Http\Controllers\AppBaseController;
use App\Mail\SystemMail;
use App\Repositories\ParcelRepository;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Flash;
use Helper;
use Response;

class ParcelController extends AppBaseController
{
    /** @var ParcelRepository $parcelRepository*/
    private $parcelRepository;

    public function __construct(ParcelRepository $parcelRepo)
    {
        $this->parcelRepository = $parcelRepo;
    }

    /**
     * Display a listing of the Parcel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $parcels = $this->parcelRepository->all()->sortByDesc("id");

        return view('admin.parcels.index')
            ->with('parcels', $parcels);
    }

    /**
     * Show the form for creating a new Parcel.
     *
     * @return Response
     */
    public function create($user_id)
    {
        $user = $this->parcelRepository->findUser($user_id);
        $address = $this->parcelRepository->findDefaultAddress($user_id);

        if (empty($address)) {
            Flash::error('Default addresses not found');

            return redirect(route('users.show',$user_id));
        }

        $selectAddresses = $this->shapingAddress($address);

        return view('admin.parcels.create')->with('user', $user)
                                           ->with('selectAddresses', $selectAddresses);
    }
    private function shapingAddress($address) {
        $selectAddresses = [];
        if($address){
            $selectAddresses[$address->id] = $address->country;
        }
        return $selectAddresses;
    }

    /**
     * Store a newly created Parcel in storage.
     *
     * @param CreateParcelRequest $request
     *
     * @return Response
     */
    public function store(CreateParcelRequest $request)
    {
        $input = $request->all();

        $parcel = $this->parcelRepository->create($input);

        Flash::success('Parcel saved successfully.');

        return redirect(route('parcels.show',$parcel->id));
    }

    /**
     * Display the specified Parcel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $parcel = $this->parcelRepository->find($id);
        $user = $this->parcelRepository->findUser($parcel->user_id);
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('parcels.index'));
        }
        $parcelItems = $this->parcelRepository->getParcelItem($id);
        $invoices = $this->parcelRepository->getInvoiceByParcelId($id);

        if (empty($parcel)) {
            Flash::error('Parcel not found');

            return redirect(route('parcels.index'));
        }

        return view('admin.parcels.show')->with('parcel', $parcel)
                                         ->with('user', $user)
                                         ->with('parcelItems', $parcelItems)
                                         ->with('invoices', $invoices);
    }

    /**
     * Show the form for editing the specified Parcel.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $parcel = $this->parcelRepository->find($id);
        $user = $this->parcelRepository->findUser($parcel->user_id);
        if (empty($user)) {
            Flash::error('User not found');

            return redirect(route('parcels.index'));
        }
        $address = $this->parcelRepository->findAddress($parcel->address_id);
        if (empty($address)) {
            Flash::error('Addresses not found');

            return redirect(route('parcels.show',$id));
        }
        $selectAddresses = $this->shapingAddress($address);

        if (empty($parcel)) {
            Flash::error('Parcel not found');

            return redirect(route('parcels.index'));
        }

        return view('admin.parcels.edit')->with('parcel', $parcel)
                                         ->with('user', $user)
                                         ->with('selectAddresses', $selectAddresses);
    }

    /**
     * Update the specified Parcel in storage.
     *
     * @param int $id
     * @param UpdateParcelRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateParcelRequest $request)
    {
        $parcel = $this->parcelRepository->find($id);

        if (empty($parcel)) {
            Flash::error('Parcel not found');

            return redirect(route('parcels.index'));
        }

        $parcel = $this->parcelRepository->update($request->all(), $id);

        Flash::success('Parcel updated successfully.');

        return redirect(route('parcels.show',$id));
    }

    /**
     * Remove the specified Parcel from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $parcel = $this->parcelRepository->find($id);

        if (empty($parcel)) {
            Flash::error('Parcel not found');

            return redirect(route('parcels.index'));
        }

        $this->parcelRepository->delete($id);

        Flash::success('Parcel deleted successfully.');

        return redirect(route('users.show', [$parcel->user_id]));
    }


    /**
     * Home -- Show the PARCEL INFORMATION.
     */
    public function parcels()
    {
        $user = Auth::user();

        $parcels = $this->parcelRepository->getParcelPaginate($user->id);

        return view('home.parcels.index')->with('parcels',$parcels);
    }
  
    /**
     * Home -- Display the specified Parcel.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function showParcel(Request $request)
    {
        $parcel = $this->parcelRepository->find($request->id);
        if (empty($parcel)) {
            \Session::flash('flash_error', 'Parcel not found.');
        }

        $user = Auth::user();
        $addresses = $this->parcelRepository->getAddress($user->id); 
        if (count($addresses) == 0) {
            \Session::flash('flash_error', 'Address not found.');
        }
        $selectAddresses = $this->shapingAddress2($addresses);


        return view('home.parcels.show')->with('parcel', $parcel)
                                        ->with('selectAddresses', $selectAddresses);
    }
    private function shapingAddress2($addresses) {
        $selectAddresses = [];
        foreach($addresses as $address) {
            $selectAddresses += [$address->id => $address->name];
        }
        return $selectAddresses;
    }

    /**
     * Home -- Update the specified Parcel in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function updateParcel(Request $request)
    {
        $parcel = $this->parcelRepository->find($request->id);

        if (empty($parcel)) {
            \Session::flash('flash_error', 'Parcel not found.');
            return redirect(route('home.parcels'));
        }

        $parcel = $this->parcelRepository->update($request->all(), $request->id);

        // ステータスがCHNGEの場合請求を準備中にする
        if($parcel->status == config('const.parcel.status.CHANGE') && isset($parcel->invoice->id)){
            $invoice = $this->parcelRepository->findInvoice($parcel->invoice->id);
            $invoice->status = config('const.invoice.status.PREPARING');
            $invoice->save();

            // 運営にメール通知
            $data = [
                'user' => Auth::user(),
                'parcel' => $parcel
            ];
            Mail::to(config('const.mail.to'))->send(new SystemMail(config('const.mail.type.CHANGE'),$data));
        }
        
        \Session::flash('flash_success', 'Parcel updated successfully.');

        return redirect(route('home.parcels'));
    }

    /**
     * Home -- Update the Sipping of Parcel in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function updateSipping(Request $request)
    {
        $invoice = $this->parcelRepository->findInvoice($request->invoice_id);
        if (empty($invoice)) {
            \Session::flash('flash_error', 'Invoice not found.');
            return redirect(route('home.invoices'));
        }
        $parcel = $this->parcelRepository->find($invoice->parcel_id);
        if (empty($parcel)) {
            \Session::flash('flash_error', 'Parcel not found.');
            return redirect(route('home.invoices'));
        }

        $parcel = $this->parcelRepository->update($request->all(), $parcel->id);
        $shipping_cost = $parcel->ems_postage;
        switch($request->shipment){
            case config('const.shipment.cd.SAL'):
                $shipping_cost = $parcel->sal_postage;
                break;
            case config('const.shipment.cd.OTHER'):
                $shipping_cost = $parcel->other_postage;
                break;
        }
        $invoice_detail = $this->parcelRepository->updateShippingCost($shipping_cost,$invoice->id);

        return view('home.invoices.show')->with('invoice', $invoice)
                                         ->with('parcel', $parcel)
                                         ->with('flash_success', 'Shipping cost updated successfully.');
    }


    /**
     * Admin -- Show the PARCEL CSV.
     */
    public function csvParcel()
    {
        return view('admin.parcels.csv');
    }

    /**
     * Admin -- Download Parcel CSV.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function csvParcelDownload(Request $request)
    {
        $query = \App\Models\Parcel::where('id','>','0');

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

        $parcels = $query->orderBy('id');

        // コールバック関数に１行ずつ書き込んでいく処理を記述
        $callback = function () use ($parcels) {
            // 出力バッファをopen
            $stream = fopen('php://output', 'w');
            // 文字コードをShift-JISに変換
//            stream_filter_prepend($stream, 'convert.iconv.utf-8/cp932//TRANSLIT');
            // ヘッダー行
            fputcsv($stream, [
                '#',
                'status',
                'user_id',
                'weight',
                'additional',
                'shipment',
                'stored',
                'shipped',
                'reference',
                'notes',
                'payment',
                'recipient',
                'country',
                'address1',
                'address2',
                'city',
                'county',
                'post',
                'item_name',
                'item_quantity',
                'item_value',
                'item repeat ...',
            ]);

            // ２行目以降の出力
            // cursor()メソッドで１レコードずつストリームに流す処理を実現できる。
            foreach ($parcels->cursor() as $parcel) {

                $row = [];
                $row[] = $parcel->id;
                $row[] = config('const.parcel.status_list.'.$parcel->status);
                $row[] = 'JP'.$parcel->user_id;
                $row[] = $parcel->weight;
                $row[] = $parcel->additional;
                $row[] = config('const.shipment.list.'.$parcel->shipment);
                $row[] = $parcel->stored;
                $row[] = $parcel->shipped;
                $row[] = $parcel->reference;
                $row[] = $parcel->notes;
                if(isset($parcel->invoice->invoiceDetails)){
                    $row[] = Helper::getTotlePayment($parcel->invoice->invoiceDetails);
                }else{
                    $row[] = 0;
                }
                if(isset($parcel->address)){
                    $row[] = $parcel->address->recipient;
                    $row[] = $parcel->address->country;
                    $row[] = $parcel->address->address1;
                    $row[] = $parcel->address->address2;
                    $row[] = $parcel->address->city;
                    $row[] = $parcel->address->county;
                    $row[] = $parcel->address->post;
                }else{
                    $row[] = '';
                    $row[] = '';
                    $row[] = '';
                    $row[] = '';
                    $row[] = '';
                    $row[] = '';
                    $row[] = '';
                }
                if(isset($parcel->parcelItems)){
                    foreach($parcel->parcelItems as $parcelItem){
                        $row[] = $parcelItem->name;
                        $row[] = $parcelItem->quantity;
                        $row[] = $parcelItem->value;
                    }
                }


                fputcsv($stream, $row);
            }
            fclose($stream);
        };
        
        // 保存するファイル名
        $filename = sprintf('parcel-%s.csv', date('YmdHis'));
        
        // ファイルダウンロードさせるために、ヘッダー出力を調整
        $header = [
            'Content-Type' => 'application/octet-stream',
        ];
        
        return response()->streamDownload($callback, $filename, $header);

    }
}
