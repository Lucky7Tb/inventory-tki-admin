<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
class Room extends Model
{
    protected $table = "room";
    protected $primaryKey = "room_id";
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->room_id = Helper::randString();
        });
    }
}
