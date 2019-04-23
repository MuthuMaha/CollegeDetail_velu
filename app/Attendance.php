<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
   protected $table='attendances';
   public $fillable=[ 'department_id', 'subject_id', 'hour', 'date'];
}
