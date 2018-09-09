<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'mobile_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'userrole', 'userid', 'roleid')->withTimestamps();
    }

    public static function validateRole($role)
    {
        $roles = \Auth::user()->roles()->get();
       
        $userRole = array();
        foreach ($roles as $urole) {
            $userRole[]=$urole->role;
        }
       if (in_array($role, $userRole)) {
           return true;
       }
       else {
           return false;
       }
       

    }
    
}
