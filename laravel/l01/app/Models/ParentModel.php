<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Support\Facades\Auth;

/**
 * Class ParentModel
 */
class ParentModel extends Model
{
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
