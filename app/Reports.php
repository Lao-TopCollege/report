<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    protected $fillable = [
        'teacher_id',
        'academic_id',
        'class_id',
        'report'
    ];
}
