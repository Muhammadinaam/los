<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\User;
use Datatables;
use DB;
use Voyager;

class UsersController extends Controller
{
    //

    public function index()
    {
    	$dataType = \TCG\Voyager\Models\DataType::where('slug', '=', 'users')->first();

    	return view('users.browse', compact('dataType') );
    }

    public function datatable()
    {
    	
    	$query = DB::table('users')
    					->join('roles', 'users.role_id', '=', 'roles.id' )
    					->select('users.id', 'users.name', 'users.email', 'users.avatar', 'users.company_name', 'users.country', 'users.city', 'users.telephone', 'users.mobile', 'roles.display_name');

        return Datatables::of($query)
        	->editColumn('avatar', function($user){
        		return "<img src='".Voyager::image( $user->avatar )."' style='width:100px'>";
        	})
	        ->addColumn('action', function($user){
	        	return '<div class="btn-sm btn-danger pull-right delete" data-id="'.$user->id.'" id="delete-'.$user->id.'">
                                            <i class="voyager-trash"></i>
                                        </div>
                                        <a href="'.route('voyager.users.edit', $user->id).'" class="btn-sm btn-primary pull-right edit">
                                            <i class="voyager-edit"></i>
                                        </a>
                                        <a href="'.route('voyager.users.show', $user->id).'" class="btn-sm btn-warning pull-right">
                                            <i class="voyager-eye"></i>
                                        </a>';
	        })
	        ->make(true);
    }

}
