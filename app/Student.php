<?php

namespace App;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use App\Token;
use App\OmrModels\role;
use App\Ipmpc;
use Auth;

class Student extends Authenticatable
{
    //
    
    use Notifiable;
    protected $table = 'students';
    protected $primaryKey = 'Admission_No';
    protected $fillable=[ 'id','department_id','Student_Name', 'Admission_No', 'DOB', 'Address', 'Email', 'Mobile_No',];
    private static $test_types=[];
      public function getBodyAttributes($value)
    {
        return ucfirst(strtolower($value));
    }

     public function roles()
    {
        return $this->belongsToMany('App\OmrModels\role');
    }

   




}
