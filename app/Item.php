<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Helpers\Helper;
class Item extends Model
{
    protected $table = "item";
    protected $primaryKey = "item_id";
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->item_id = Helper::randString();
        });
    }
}
