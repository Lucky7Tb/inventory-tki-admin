<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
use App\Item;
use App\Student;
class Borrowing extends Model
{
    protected $table = "borrowing";
    protected $primaryKey = "borrowing_id";
    protected $appends = [
        'item_id',
        'student_id'
    ];
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->borrowing_id = Helper::randString();
        });
    }

    protected function getItemIdAttribute(){
        $dataItem = Item::where('item_id', $this->attributes['item_id'])->first();
        if($dataItem){
            $data['item_id'] = $dataItem->item_id;
            $data['item_name'] = $dataItem->item_name;
            return $data;
        }
        return false;
    }

    protected function getStudentIdAttribute(){
        $dataStudent = Student::where('student_id', $this->attributes['student_id'])->first();
        if($dataStudent){
            $data['student_name'] = $dataStudent->student_name;
            $data['student_class'] = $dataStudent->student_class;
            return $data;
   
        }
        return false;
    }
}
