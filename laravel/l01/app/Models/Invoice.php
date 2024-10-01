<?php

namespace App\Models;

use App\Models\ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Invoice
 * @package App\Models
 * @version August 22, 2022, 8:24 am JST
 *
 * @property integer $user_id
 * @property integer $parcel_id
 * @property string $status
 * @property string $kind
 * @property string $paid
 */
class Invoice extends ParentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'invoices';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'parcel_id',
        'status',
        'type',
        'method',
        'issued',
        'paid',
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'parcel_id' => 'integer',
        'status' => 'string',
        'type' => 'string',
        'method' => 'string',
        'issued' => 'date',
        'paid' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|numeric',
        'status' => 'required',
        'type' => 'required',
    ];

    /**
     * リレーションUser
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
  
    /**
     * リレーションInvoiceDetail
     */
    public function invoiceDetails()
    {
        return $this->hasMany('App\Models\InvoiceDetail');
    }    

}
