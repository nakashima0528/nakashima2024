<?php

namespace App\Models;

use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmailContract
{
    use SoftDeletes;
    use MustVerifyEmail, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'email',
        'identity',
        'title',
        'forename',
        'surname',
        'birth',
        'notes',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'forename' => 'required',
        'surname' => 'required',
        'email' => 'required',
        'birth' => 'required',
        'password' => 'required|min:8',
    ];

    /**
     * リレーションParcel
     */
    public function parcels()
    {
        return $this->hasMany('App\Models\Parcel');
    }    

    /**
     * リレーションParcel
     */
    public function invoices()
    {
        return $this->hasMany('App\Models\Invoice');
    }    

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
        static::deleting(function ($model) {
            $model->deleted_by = Auth::user()->id ?? null;
            $model->update();
        });
    }

}
