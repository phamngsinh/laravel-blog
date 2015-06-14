<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{

	 public function setTitleAttribute($value)
	  {
	  	$this->attributes['title'] = $value.'Test thoi ma';
	  }

}
