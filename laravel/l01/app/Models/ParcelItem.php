<?php

namespace App\Models;

use App\Models\ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ParcelItem
 * @package App\Models
 * @version August 23, 2022, 8:01 am JST
 *
 * @property integer $parcel_id
 * @property string $name
 * @property integer $quantity
 * @property number $value
 */
class ParcelItem extends ParentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'parcel_items';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'parcel_id',
        'name',
        'quantity',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'parcel_id' => 'integer',
        'name' => 'string',
        'quantity' => 'integer',
        'value' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'parcel_id' => 'required|numeric',
        'name' => 'required',
        'quantity' => 'numeric',
        'value' => 'numeric'
    ];

    /**
     * リレーションParcel
     */
    public function parcel()
    {
        return $this->belongsTo('App\Models\Parcel');
    }
    
}
