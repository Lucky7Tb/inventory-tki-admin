<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
class ItemCategory extends Model
{
    protected $table = "item_category";
    protected $primaryKey = "item_category_id";
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->item_category_id = Helper::randString();
        });
    }

    public function item(){
        return $this->hasOne('App\Item', 'item_category_id', 'item_category_id');
    }
}
