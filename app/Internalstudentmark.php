<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internalstudentmark extends Model
{
    protected $table="internalstudentmarks";
    protected $fillable=['internalmark_id', 'student_id', 'Obtained_Mark'];
}
