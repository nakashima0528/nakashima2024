<?php

namespace App\Repositories;

use App\Models\Address;
use App\Models\Invoice;
use App\Models\InvoiceDetail;
use App\Models\Parcel;
use App\Models\ParcelItem;
use App\Models\SystemSetting;
use App\Models\Ticket;
use App\Models\User;
use DateTime;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;


abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Application
     */
    protected $app;

    /**
     * @param Application $app
     *
     * @throws \Exception
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * Get searchable fields array
     *
     * @return array
     */
    abstract public function getFieldsSearchable();

    /**
     * Configure the Model
     *
     * @return string
     */
    abstract public function model();

    /**
     * Make Model instance
     *
     * @throws \Exception
     *
     * @return Model
     */
    public function makeModel()
    {
        $model = $this->app->make($this->model());

        if (!$model instanceof Model) {
            throw new \Exception("Class {$this->model()} must be an instance of Illuminate\\Database\\Eloquent\\Model");
        }

        return $this->model = $model;
    }

    /**
     * Paginate records for scaffold.
     *
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $columns = ['*'])
    {
        $query = $this->allQuery();

        return $query->paginate($perPage, $columns);
    }

    /**
     * Build a query for retrieving all records.
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function allQuery($search = [], $skip = null, $limit = null)
    {
        $query = $this->model->newQuery();

        if (count($search)) {
            foreach($search as $key => $value) {
                if (in_array($key, $this->getFieldsSearchable())) {
                    $query->where($key, $value);
                }
            }
        }

        if (!is_null($skip)) {
            $query->skip($skip);
        }

        if (!is_null($limit)) {
            $query->limit($limit);
        }

        return $query;
    }

    /**
     * Retrieve all records with given filter criteria
     *
     * @param array $search
     * @param int|null $skip
     * @param int|null $limit
     * @param array $columns
     *
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all($search = [], $skip = null, $limit = null, $columns = ['*'])
    {
        $query = $this->allQuery($search, $skip, $limit);

        return $query->get($columns);
    }

    /**
     * Create model record
     *
     * @param array $input
     *
     * @return Model
     */
    public function create($input)
    {
        $model = $this->model->newInstance($input);

        $model->save();

        return $model;
    }

    /**
     * Find model record for given id
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model|null
     */
    public function find($id, $columns = ['*'])
    {
        $query = $this->model->newQuery();

        return $query->find($id, $columns);
    }

    /**
     * Update model record for given id
     *
     * @param array $input
     * @param int $id
     *
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection|Model
     */
    public function update($input, $id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        $model->fill($input);

        $model->save();

        return $model;
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function delete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        return $model->delete();
    }

    /**
     * @param int $id
     *
     * @throws \Exception
     *
     * @return bool|mixed|null
     */
    public function forceDelete($id)
    {
        $query = $this->model->newQuery();

        $model = $query->findOrFail($id);

        return $model->forceDelete();
    }

    /**
     * Find User by user id
     */
    public function findUser($user_id)
    {
        return User::find($user_id);
    }

    /**
     * Find Address by id
     */
    public function findAddress($address_id)
    {
        return Address::find($address_id);
    }

    /**
     * Get Address by user id
     */
    public function getAddress($user_id)
    {
        return Address::where('user_id', $user_id)->orderBy('type')->orderBy('id')->get();
    }

    /**
     * Find Address by user id
     */
    public function findDefaultAddress($user_id)
    {
        return Address::where('user_id',$user_id)->where('default',config('const.check.cd.ON'))->first();
    }
    
    /**
     * Find Parcel by id
     */
    public function findParcel($parcel_id)
    {
        return Parcel::find($parcel_id);
    }

    /**
     * Get Parcel by user id
     */
    public function getParcel($user_id,$is_account = false)
    {
        $query = Parcel::where('user_id', $user_id);
    
        if($is_account){
            $query->where('status','!=',config('const.parcel.status.PREPARING'));
        }

        return $query->orderByDesc('id')->get();
    }

    /**
     * Get Parcel by user id paginate
     */
    public function getParcelPaginate($user_id)
    {
        $query = Parcel::where('user_id', $user_id)->where('status','!=',config('const.parcel.status.PREPARING'));

        return $query->orderByDesc('id')->paginate(10);
    }

    /**
     * Get Parcel by user status
     */
    public function getParcelByStatus($status)
    {
        return Parcel::where('status', $status)->orderByDesc('id')->get();
    }

    /**
     * Get Parcel 保管期限オバー
     */
    public function getParcelStorageOver()
    {
        return Parcel::whereIn('status', [config('const.parcel.status.PREPARING'),config('const.parcel.status.CHANGE'),config('const.parcel.status.PENDING')])
                     ->where('additional','>',0)
                     ->orderByDesc('id')
                     ->get();
    }

    /**
     * Get Parcel 請求中
     */
    public function getParcelStatusInvalid()
    {
        return Parcel::where('status', config('const.parcel.status.PENDING'))
                     ->whereHas('invoice', function ($query) {
                        $query->where('status','!=',config('const.invoice.status.PENDING'));
                     })
                     ->orderByDesc('id')
                     ->get();
    }

     /**
     * Get invoice 請求期限切れ
     */
    public function getInvoiceDueOver()
    {
        $date = new DateTime();
        // 現状時間は無視して日付のみで比較
        $reference_date = $date->modify('-'.config('const.payment.due').' days')->format('Y-m-d');
        return Invoice::whereIn('status', [config('const.invoice.status.PENDING'),config('const.invoice.status.WISE')])
                     ->whereDate('issued','<',$reference_date)
                     ->orderByDesc('id')
                     ->get();
    }

   /**
     * Get ParcelItem by parcel id
     */
    public function getParcelItem($parcel_id)
    {
        return ParcelItem::where('parcel_id', $parcel_id)->orderBy('id')->get();
    }

    /**
     * Find Invoice by id
     */
    public function findInvoice($invoice_id)
    {
        return Invoice::find($invoice_id);
    }

    /**
     * Get Invoice by user id
     */
    public function getInvoice($user_id,$is_account = false)
    {
        $query = Invoice::where('user_id', $user_id);
    
        if($is_account){
            $query->where('status','!=',config('const.invoice.status.PREPARING'));
        }

        return $query->orderByDesc('id')->get();
    }

    /**
     * Get Invoice by user id paginate
     */
    public function getInvoicePaginate($user_id,$status = null)
    {
        $query = Invoice::where('user_id', $user_id);
        if($status) {
            $query->whereIn('status',$status);
        }else{
            $query->where('status','!=',config('const.invoice.status.PREPARING'));
        }
        return $query->orderByDesc('id')->paginate(10);
    }

    /**
     * Get Invoice by parcel id
     */
    public function getInvoiceByParcelId($parcel_id)
    {
        $query = Invoice::where('parcel_id', $parcel_id);
    
        return $query->orderByDesc('id')->get();
    }

    /**
     * Get InvoiceDetail by invoice id
     */
    public function getInvoiceDetail($invoice_id)
    {
        return InvoiceDetail::where('invoice_id', $invoice_id)->orderBy('id')->get();
    }

    /**
     * Get Ticket by user id
     */
    public function getTicket($user_id)
    {
        return Ticket::where('user_id', $user_id)->orderBy('id')->get();
    }


    /**
     * SCSの請求を自動生成する。
     */
    public function autoCreateParcelInvoce($user_id,$parcel_id)
    {
        // user_id　parcel_id　で検索しあれば更新、無ければ作成
        $invoice = Invoice::firstOrNew([
            'user_id' => $user_id,
            'parcel_id' => $parcel_id
        ]);
        $invoice->status = config('const.invoice.status.PREPARING');
        $invoice->type = config('const.invoice.type.SCS');
        $invoice->issued = new DateTime();
        $invoice->save();
        Log::info("invoice id" . $invoice->id);

        $parcel = Parcel::find($parcel_id);

        // SCS費登録
        $invoiceDetail = InvoiceDetail::firstOrNew([
            'invoice_id' => $invoice->id,
            'type' => config('const.invoice_details.type.SCS')
        ]);
        $scsFee = config('const.scs.fee.30000');
        foreach(config('const.scs.fee') as $weight => $fee){
            if($parcel->weight <= $weight) {
                $scsFee = $fee;
                break;
            }
        }
        $invoiceDetail->value = $scsFee;
        $invoiceDetail->save();

        // 配送費登録
        $invoiceDetail = InvoiceDetail::firstOrNew([
            'invoice_id' => $invoice->id,
            'type' => config('const.invoice_details.type.SHIPPING')
        ]);
        switch($parcel->shipment){
            case config('const.shipment.cd.SAL'):
                $invoiceDetail->value = $parcel->sal_postage;
                break;
            case config('const.shipment.cd.OTHER'):
                $invoiceDetail->value = $parcel->other_postage;
                break;
            default:
                $invoiceDetail->value = $parcel->ems_postage;
        }
        $invoiceDetail->save();

        // 保管費登録
        $invoiceDetail = InvoiceDetail::firstOrNew([
            'invoice_id' => $invoice->id,
            'type' => config('const.invoice_details.type.STORAGE')
        ]);
        if($parcel->additional > 0){
            $invoiceDetail->value = config('const.scs.additional') * $parcel->additional;
            $invoiceDetail->name = $parcel->additional.' days × '.config('const.scs.additional').' JPY';
            $invoiceDetail->save();
        }else{
            $invoiceDetail->delete();
        }

        return $invoice;
    }

    /**
     * 請求明細の配送料金を更新する
     */
    public function updateShippingCost($sipping_cost, $invoice_id)
    {
        $model = InvoiceDetail::where('invoice_id', $invoice_id)->where('type', config('const.invoice_details.type.SHIPPING'))->first();
        $model->value = $sipping_cost;
        $model->save();

        return $model;
    }

    
    /**
     * Find System by id
     */
    public function valueOfFindSystem($id)
    {
        $model = SystemSetting::find($id);
        return $model->value;
    }

    

}
