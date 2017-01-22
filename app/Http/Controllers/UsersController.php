<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use TCG\Voyager\Models\User;
use Datatables;
use DB;
use Voyager;
use Auth;

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

    public function teamMembersList()
    {

        $teamMembers = DB::table('users')
                        ->where('company_name', Auth::user()->company_name)
                        ->where('id', '<>', Auth::user()->id)
                        ->get();

        return view('users.team_members_list', compact('teamMembers'));
    }

    public function addTeamMemberForm()
    {
        return view('auth.register', ['add_team_member' => '1'] );
    }

    public function addTeamMember(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'country' => 'required',
            'city' => 'required',
            'telephone' => 'required',
            'mobile' => 'required',]
            );

        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'company_name' => Auth::user()->company_name,
            'country' => $request->input('country'),
            'city' => $request->input('city'),
            'telephone' => $request->input('telephone'),
            'mobile' => $request->input('mobile'),
            'activated' => '1',
        ]);

        $this->updateStripeQty();

        return redirect('team-members');
    }

    public function deleteTeamMember(Request $request)
    {
        $user = DB::table('users')
                ->where('company_name', Auth::user()->company_name)
                ->where('id', $request->input('id'))
                ->delete();

        $this->updateStripeQty();

        return redirect('team-members');   
    }

    public function updateStripeQty()
    {
        Auth::user()->subscription('default')->updateQuantity($updatedQty);

        $updatedQty = DB::table('users')
                        ->where('company_name', Auth::user()->company_name)
                        ->count();

        
    }

}
