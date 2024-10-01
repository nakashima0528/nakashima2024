<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CreateInvoiceDetailRequest;
use App\Http\Requests\UpdateInvoiceDetailRequest;
use App\Repositories\InvoiceDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class InvoiceDetailController extends AppBaseController
{
    /** @var InvoiceDetailRepository $invoiceDetailRepository*/
    private $invoiceDetailRepository;

    public function __construct(InvoiceDetailRepository $invoiceDetailRepo)
    {
        $this->invoiceDetailRepository = $invoiceDetailRepo;
    }

    /**
     * Show the form for creating a new InvoiceDetail.
     *
     * @return Response
     */
    public function create($invoice_id)
    {
        $invoice = $this->invoiceDetailRepository->findInvoice($invoice_id);
        $user = $this->invoiceDetailRepository->findUser($invoice->user_id);
        return view('admin.invoice_details.create')->with('invoice', $invoice)
                                                   ->with('user', $user);
    }

    /**
     * Store a newly created InvoiceDetail in storage.
     *
     * @param CreateInvoiceDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateInvoiceDetailRequest $request)
    {
        $input = $request->all();

        $invoiceDetail = $this->invoiceDetailRepository->create($input);

        Flash::success('Invoice Detail saved successfully.');

        return redirect(route('invoices.show',$invoiceDetail->invoice_id));
    }

    /**
     * Display the specified InvoiceDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $invoiceDetail = $this->invoiceDetailRepository->find($id);
        $invoice = $this->invoiceDetailRepository->findInvoice($invoiceDetail->invoice_id);
        $user = $this->invoiceDetailRepository->findUser($invoice->user_id);

        if (empty($invoiceDetail)) {
            Flash::error('Invoice Detail not found');

            return redirect(route('invoiceDetails.index'));
        }

        return view('admin.invoice_details.show')->with('invoiceDetail', $invoiceDetail)
                                                 ->with('invoice', $invoice)
                                                 ->with('user', $user);
    }

    /**
     * Show the form for editing the specified InvoiceDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $invoiceDetail = $this->invoiceDetailRepository->find($id);
        $invoice = $this->invoiceDetailRepository->findInvoice($invoiceDetail->invoice_id);
        $user = $this->invoiceDetailRepository->findUser($invoice->user_id);

        if (empty($invoiceDetail)) {
            Flash::error('Invoice Detail not found');

            return redirect(route('invoiceDetails.index'));
        }

        return view('admin.invoice_details.edit')->with('invoiceDetail', $invoiceDetail)
                                                 ->with('invoice', $invoice)
                                                 ->with('user', $user);
    }

    /**
     * Update the specified InvoiceDetail in storage.
     *
     * @param int $id
     * @param UpdateInvoiceDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInvoiceDetailRequest $request)
    {
        $invoiceDetail = $this->invoiceDetailRepository->find($id);

        if (empty($invoiceDetail)) {
            Flash::error('Invoice Detail not found');

            return redirect(route('invoiceDetails.index'));
        }

        $invoiceDetail = $this->invoiceDetailRepository->update($request->all(), $id);

        Flash::success('Invoice Detail updated successfully.');

        return redirect(route('invoices.show',$invoiceDetail->invoice_id));
    }

    /**
     * Remove the specified InvoiceDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $invoiceDetail = $this->invoiceDetailRepository->find($id);

        if (empty($invoiceDetail)) {
            Flash::error('Invoice Detail not found');

            return redirect(route('invoiceDetails.index'));
        }

        $this->invoiceDetailRepository->delete($id);

        Flash::success('Invoice Detail deleted successfully.');

        return redirect(route('invoices.show',$invoiceDetail->invoice_id));
    }

    /**
     * Home -- Update the specified Invoice in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function updateSippingCost(Request $request)
    {
        $parcel = $this->invoiceRepository->find($request->id);

        if (empty($parcel)) {
            Flash::error('Parcel not found');
            return redirect(route('home.parcels'));
        }

        $parcel = $this->parcelRepository->update($request->all(), $request->id);

        Flash::success('Parcel updated successfully.');

        return redirect(route('home.parcels'));
    }


}
