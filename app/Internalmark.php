<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Internalmark extends Model
{
    protected $table="internalmarks";

    protected $fillable= ['department_id', 'Internal', 'subject_id'];
}
