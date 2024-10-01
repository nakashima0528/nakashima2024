<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class SystemSetting
 * @package App\Models
 */
class SystemSetting extends Model
{
    use HasFactory;

    public $table = 'system_settings';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'value',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'value' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'value' => 'required',
    ];

}
