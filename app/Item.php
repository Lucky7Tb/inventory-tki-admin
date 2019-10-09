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

    public function room()
    {
        return $this->belongsTo('App\Room', 'room_id', 'room_id');
    }

    public function itemcategory()
    {
        return $this->belongsTo('App\ItemCategory', 'item_category_id', 'item_category_id');
    }
   
}
