<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
	protected $table="assignments";
    protected $fillable=['department_id', 'subject_id', 'Date_of_submission', 'File_path','Description'];
}
