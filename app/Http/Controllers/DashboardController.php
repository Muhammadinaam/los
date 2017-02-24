<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class DashboardController extends Controller
{
    //

    public function index()
    {

    	return view('dashboard', $this->dashboard_data(Auth::user()->id) );
    }

    public function index_api(Request $request)
    {
    	$data = json_decode( $request->getContent(), true ) ;

        $user = \App\User::find( $data['user_id'] );

        $isActive = $user->isActive();

        if($isActive['is_user_active'] == 'false')
        {
            return $isActive;
        }

        return array( 'success' => 'true', 'info' => $this->dashboard_data($user->id) );
    }

    public function dashboard_data($user_id)
    {
    	$recentlyViewed = DB::table('recentlyviewedprojects')
		  							->leftJoin('projects', 'projects.id', '=', 'recentlyviewedprojects.project_id')
		  							->where('recentlyviewedprojects.user_id', $user_id)
		  							->orderBy(DB::raw('max(recentlyviewedprojects.created_at)'), 'desc')
		  							->groupBy('projects.id', 'projects.title')
		  							->select('projects.id', 'projects.title', 'projects.image', 'projects.address',
		  								'projects.city', 'projects.country', DB::raw('max(recentlyviewedprojects.created_at) as created_at'))
		  							->limit(5)
		  							->get();

		$trendingProjects = DB::table('recentlyviewedprojects')
		  							->leftJoin('projects', 'projects.id', '=', 'recentlyviewedprojects.project_id')
		  							->orderBy(DB::raw('count(recentlyviewedprojects.id)'), 'desc')
		  							->groupBy('projects.id')
		  							->select('projects.id', 'projects.title', 'projects.image', 'projects.address',
		  								'projects.city', 'projects.country', DB::raw('count(recentlyviewedprojects.id) as count'))
		  							->limit(5)
		  							->get();


		$mostFavouriteProjects = DB::table('favouriteprojects')
		  							->leftJoin('projects', 'projects.id', '=', 'favouriteprojects.project_id')
		  							->orderBy(DB::raw('count(favouriteprojects.id)'), 'desc')
		  							->groupBy('projects.id')
		  							->select('projects.id', 'projects.title', 'projects.image', 'projects.address',
		  								'projects.city', 'projects.country', DB::raw('count(favouriteprojects.id) as count'))
		  							->limit(5)
		  							->get();

		$toActionNowProjects = DB::table('projecttags')
		  							->leftJoin('projects', 'projects.id', '=', 'projecttags.project_id')
		  							->select('projects.id', 'projects.title', 'projects.image', 'projects.address',
		  								'projects.city', 'projects.country')
		  							->where('projecttags.user_id', $user_id)
		  							->get();

		return compact('recentlyViewed', 'trendingProjects', 'mostFavouriteProjects', 'toActionNowProjects');
    }
}
