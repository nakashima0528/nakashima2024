<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\AppBaseController;
use App\Repositories\ParcelRepository;
use Artisan;
use Illuminate\Http\Request;

class HomeController extends AppBaseController
{
    private $parcelRepository;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ParcelRepository $parcelRepo)
    {
        $this->middleware('verified');
        $this->parcelRepository = $parcelRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // CHANGEステータス
        $changed_parcels = $this->parcelRepository->getParcelByStatus(config('const.parcel.status.CHANGE'));
        // PROCESSINGステータス
        $processing_parcels = $this->parcelRepository->getParcelByStatus(config('const.parcel.status.PROCESSING'));
        // PREPARINGステータス
        $preparing_parcels = $this->parcelRepository->getParcelByStatus(config('const.parcel.status.PREPARING'));
        // 保管期限オバー
        $over_parcels = $this->parcelRepository->getParcelStorageOver();
        // ステータス不整合
        $invalid_parcels = $this->parcelRepository->getParcelStatusInvalid();
        // 請求期限切れ
        $over_invoices =  $this->parcelRepository->getInvoiceDueOver();

        return view('admin.home')->with('changed_parcels', $changed_parcels)
                                 ->with('processing_parcels', $processing_parcels)
                                 ->with('preparing_parcels', $preparing_parcels)
                                 ->with('over_parcels', $over_parcels)
                                 ->with('invalid_parcels', $invalid_parcels)
                                 ->with('over_invoices', $over_invoices);
    }

    /**
     * Show the application dashboard batch.
     *
     * @return \Illuminate\Http\Response
     */
    public function batch()
    {
        Artisan::call('batch:daily');
        return redirect(route('admin.home'));
    }
}
