<?php

namespace App\Models;

use App\Models\ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends ParentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'addresses';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'type',
        'name',
        'recipient',
        'country',
        'address1',
        'address2',
        'city',
        'county',
        'post',
        'default',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'type' => 'string',
        'name' => 'string',
        'recipient' => 'string',
        'country' => 'string',
        'address1' => 'string',
        'address2' => 'string',
        'city' => 'string',
        'county' => 'string',
        'post' => 'string',
        'default' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'recipient' => 'required',
        'country' => 'required',
        'address1' => 'required',
        'city' => 'required',
        'post' => 'required',
    ];

    /**
     * リレーションParcel
     */
    public function parcels()
    {
        return $this->hasMany('App\Models\Parcel');
    }    
}
