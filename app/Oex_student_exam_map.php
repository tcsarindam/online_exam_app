<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oex_student_exam_map extends Model
{
    //
    //oex_student_exam_maps
    protected $table = "oex_student_exam_maps";
    protected $primaryKey = "id";
    protected $fillable = ['user_id','exam_id','title','exam_date','status'];
}
