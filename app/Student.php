<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Helpers\Helper;
class Student extends Model
{
    protected $table = "student";
    protected $primaryKey = "student_id";
    protected $guarded = ['student_id'];
    public $incrementing = false;
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->student_id = Helper::randString();
            $model->student_password = Helper::randPassword();
        });
    }

}
