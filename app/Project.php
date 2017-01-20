<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Project extends Model
{
	public function updates()
	{
		return $this->hasMany('App\Update');
	}
}
