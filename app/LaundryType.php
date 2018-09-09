<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LaundryType extends Model
{
    protected $table    = 'laundry_types';
    protected $fillable = ['price', 'type'];
    
    public function laundry()
    {
        return $this->belongsToMany('App\Laundry','laundrywithtype','typeid','laundryid')->withTimestamps()->withPivot('number_of_item');
    }
}
