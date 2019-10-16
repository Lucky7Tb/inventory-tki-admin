<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
use App\Room;
use App\ItemCategory;
class Item extends Model
{
    protected $table = "item";
    protected $primaryKey = "item_id";
    public $incrementing = false;
    protected $appends = [
        'room_id',
        'item_category_id'
    ];
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->item_id = Helper::randString();
        });
    }

    protected function getRoomIdAttribute(){
        $dataRoom = Room::where('room_id', $this->attributes['room_id'])->first();
        if($dataRoom){
            return $dataRoom->room_name;
        }
        return false;
    }

    protected function getItemCategoryIdAttribute(){
        $dataItemCategory = ItemCategory::where('item_category_id', $this->attributes['item_category_id'])->first();
        if($dataItemCategory){
            return $dataItemCategory->item_category_name;
        }
        return false;
    }

}
