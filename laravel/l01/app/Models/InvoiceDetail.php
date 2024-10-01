<?php

namespace App\Models;

use App\Models\ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class InvoiceDetail
 * @package App\Models
 * @version August 22, 2022, 4:30 pm JST
 *
 * @property integer $invoice_id
 * @property string $kind
 * @property string $name
 * @property number $value
 */
class InvoiceDetail extends ParentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'invoice_details';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'invoice_id',
        'type',
        'name',
        'value'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'invoice_id' => 'integer',
        'type' => 'string',
        'name' => 'string',
        'value' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'invoice_id' => 'required|numeric',
        'type' => 'required',
        'value' => 'required|numeric'
    ];


    /**
     * リレーションInvoice
     */
    public function invoice()
    {
        return $this->belongsTo('App\Models\Invoice');
    }
    
}
