<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Project;
use Auth;

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

    public function searchProjects()
    {
        return view('projects.projects_index');
    }

    public function searchProjects_datatable()
    {
        $query = DB::table('projects')
                        ->leftJoin('projecttags', function($join){
                            $join->on('projects.id', '=', 'projecttags.project_id')
                            ->where('projecttags.user_id', '=', Auth::user()->id);
                        })
                        ->leftJoin('projectnotes', function($join){
                            $join->on('projects.id', '=', 'projectnotes.project_id')
                            ->where('projectnotes.user_id', '=', Auth::user()->id);
                        })
                        ->select('projects.id', 'projects.title', 'projects.status', 'projects.industry', 'projects.type', 'projects.country', 'projects.city', 'projects.address', 'projects.client', 'projects.consultant', 'projects.main_contractor', 'projecttags.tag', 'projectnotes.note');

        return Datatables::of($query)
                    ->addColumn('select', function($project){
                            return '<input type="checkbox" value="'.$project->id.'">';
                        })
                    ->make(true);

    }
}
