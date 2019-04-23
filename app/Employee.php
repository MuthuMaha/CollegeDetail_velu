<?php

namespace App;

 
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
 use App\Token;
class Employee extends Authenticatable
{
    use Notifiable;
    protected $table='employees';
    protected $fillable=[ 'Staff_Name', 'Department_id', 'PAYROLL_ID', 'password', 'Designation', 'Qualification', 'DOB', 'Email', 'Address', 'Image'];
     public function getDESIGNATIONAttribute($value)
    {
        return ucfirst(strtolower($value));
    }
     public function roles()
    {
        return $this->belongsToMany('App\role');
    }

   public function tokens () {
        return $this->hasMany(Token::class, 'user_id', 'id');
    }
     
}
