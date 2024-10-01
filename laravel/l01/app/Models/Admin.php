<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required|min:8',
    ];

    /**
     * Event Hooks
     * 更新ユーザIDの設定
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->created_by = Auth::user()->id ?? null;
        });
        static::updating(function ($model) {
            $model->updated_by = Auth::user()->id ?? null;
        });
        static::saving(function ($model) {
            $model->updated_by = Auth::user()->id ?? null;
        });
    }
}
