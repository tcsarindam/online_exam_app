<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Oex_result extends Model
{
    // user_id -- fillable/not fillable?
    protected $table = "oex_results";
    protected $primaryKey = "id";
    protected $fillable = ['exam_id','user_id','yes_ans','no_ans','result_json'];
}
