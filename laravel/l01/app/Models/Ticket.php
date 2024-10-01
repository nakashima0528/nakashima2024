<?php

namespace App\Models;

use App\Models\ParentModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Ticket
 * @package App\Models
 * @version April 19, 2024, 9:24 am JST
 *
 * @property integer $user_id
 * @property string $status
 * @property string $title
 * @property string $quantity
 * @property string $unit
 * @property string $notes
 */
class Ticket extends ParentModel
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'tickets';
    
    protected $dates = ['deleted_at'];

    public $fillable = [
        'user_id',
        'status',
        'description',
        'quantity',
        'unit',
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'status' => 'string',
        'description' => 'string',
        'quantity' => 'string',
        'unit' => 'string',
        'notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required|numeric',
        'status' => 'required',
        'description' => 'required',
    ];

    /**
     * リレーションUser
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
