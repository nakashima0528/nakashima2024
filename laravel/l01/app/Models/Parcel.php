<?php

namespace App\Models;

use App\Models\ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Parcel
 * @package App\Models
 * @version August 18, 2022, 10:23 am JST
 *
 * @property integer $user_id
 * @property string $status
 * @property integer $weight
 * @property string $shipping
 * @property string $stored
 * @property string $shipped
 */
class Parcel extends ParentModel
{
    use SoftDeletes;

    use HasFactory;

    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'address_id',
        'status',
        'weight',
        'shipment',
        'additional',
        'ems_postage',
        'sal_postage',
        'other_postage',
        'stored',
        'shipped',
        'reference',
        'notes',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'address_id' => 'integer',
        'status' => 'string',
        'weight' => 'integer',
        'shipment' => 'string',
        'ems_postage' => 'integer',
        'sal_postage' => 'integer',
        'other_postage' => 'integer',
        'additional' => 'integer',
        'stored' => 'datetime',
        'shipped' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|numeric',
        'status' => 'required',
        'weight' => 'numeric',
        'ems_postage' => 'required|numeric',
        'sal_postage' => 'required|numeric',
        'other_postage' => 'nullable|numeric',
        'additional' => 'numeric',
        'stored' => 'required',
    ];

    /**
     * リレーションUser
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * リレーションAddress
     */
    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }

    /**
     * リレーションParcelItem
     */
    public function parcelItems()
    {
        return $this->hasMany('App\Models\ParcelItem');
    }    

    /**
     * リレーションInvoice
     */
    public function invoice() {
        return $this->hasOne('App\Models\Invoice');
    }

}
