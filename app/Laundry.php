<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laundry extends Model
{
     protected $table = 'laundries';
	protected $fillable = ['customer_name', 'priority','weight'];

	public function types(){

		return $this->belongsToMany('App\LaundryType','laundrywithtype','laundryid','typeid')
		->withTimestamps()
		->withPivot('number_of_item');
	}
}
