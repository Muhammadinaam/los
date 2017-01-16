<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Update extends Model
{
	public function project_id()
	{
		return $this->belongsTo('App\Project');
	}
    
}
