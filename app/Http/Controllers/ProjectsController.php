<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;

class ProjectsController extends Controller
{
    //

	public function guest_index()
	{
    	return view('projects.guest_projects_index');
    }

    public function guest_index_datatable()
    {
    	$query = DB::table('projects')
    					->select('projects.title', 'projects.industry', 'projects.type', 'projects.country', 'projects.city', 'projects.address');

    	return Datatables::of($query)->make(true);
    }
}
