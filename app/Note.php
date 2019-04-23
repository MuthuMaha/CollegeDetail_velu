<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
	protected $table="notes";
  protected $fillable=[ 'Unit', 'department_id', 'subject_id', 'Filepath'];
}
