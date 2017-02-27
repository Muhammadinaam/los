<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;
use App\Project;
use Auth;
use Voyager;

class ProjectsController extends Controller
{
    //

    public function guest_projects_api()
    {
        $result = DB::table('projects')
                        ->select('projects.title', 'projects.industry', 'projects.type', 'projects.country', 'projects.city', 'projects.address')
                        ->paginate(1);

        return array( 'success' => 'true', 'info' => $result );
    }


    public function projects_api(Request $request)
    {

        $data = json_decode( $request->getContent(), true ) ;

        $user = \App\User::find( $data['user_id'] );

        $isActive = $user->isActive();

        if($isActive['is_user_active'] == 'false')
        {
            return $isActive;
        }

        $result = DB::table('projects')
                        ->select(DB::raw('projects.*, if( favouriteprojects.user_id is null, 0, 1) as isfavourite '))
                        ->leftJoin('projecttags', function($join)use($data){
                            $join->on('projects.id', '=', 'projecttags.project_id')
                            ->where('projecttags.user_id', '=', $data['user_id'] );
                        })
                        ->leftJoin('favouriteprojects', function($join)use($data){
                            $join->on('projects.id', '=', 'favouriteprojects.project_id')
                            ->where('favouriteprojects.user_id', '=', $data['user_id']);
                        })
                        ->leftJoin('projectnotes', function($join)use($data){
                            $join->on('projects.id', '=', 'projectnotes.project_id')
                            ->where('projectnotes.user_id', '=', $data['user_id']);
                        })->paginate(1);

        return array( 'success' => 'true', 'info' => $result );
    }




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

    public function searchProjects_datatable(Request $request)
    {
        $query = DB::table('projects')
                        ->leftJoin('projecttags', function($join){
                            $join->on('projects.id', '=', 'projecttags.project_id')
                            ->where('projecttags.user_id', '=', Auth::user()->id );
                        })
                        ->leftJoin('favouriteprojects', function($join){
                            $join->on('projects.id', '=', 'favouriteprojects.project_id')
                            ->where('favouriteprojects.user_id', '=', Auth::user()->id);
                        })
                        ->leftJoin('projectnotes', function($join){
                            $join->on('projects.id', '=', 'projectnotes.project_id')
                            ->where('projectnotes.user_id', '=', Auth::user()->id);
                        });

        $tagsArray = array();

        if( $request->has('actioned') && $request->input('actioned') == '1' )
            $tagsArray[] = 'Actioned';

        if( $request->has('to_action_now') && $request->input('to_action_now') == '1' )
            $tagsArray[] = 'To Action Now';

        if( $request->has('to_action_later') && $request->input('to_action_later') == '1' )
            $tagsArray[] = 'To Action Later';

        if( $request->has('not_relevant') && $request->input('not_relevant') == '1' )
            $tagsArray[] = 'Not Relevant';

        if(count($tagsArray) > 0)
        {
            $query->whereIn('projecttags.tag', $tagsArray);
        }

        if( $request->has('projects_with_notes') && $request->input('projects_with_notes') == '1' )
            $query->where('projectnotes.note', '<>', '');

        if( $request->has('favourite_projects') && $request->input('favourite_projects') == '1' )
            $query->where('favouriteprojects.id', '<>', '');


        $query->orderBy('construction_start_date', 'desc')
            ->latest()
            ->select('projects.id', 'projects.title', 'projects.image', 'projects.status', 'projects.industry', 'projects.type', 'projects.country', 'projects.city', 'projects.address', 'projects.client', 'projects.consultant', 'projects.main_contractor', 'projecttags.tag', 'projectnotes.note', 'favouriteprojects.id as favourite_id' );

        return Datatables::of($query)
                    ->addColumn('select', function($project){
                            return '<input type="checkbox" value="'.$project->id.'" id="'.$project->id.'">';
                        })
                    ->editColumn('title', function($project){

                        $star = "";

                        if($project->favourite_id != '')
                            $star = '<i style="color:blue;" class="fa fa-star blink" aria-hidden="true"></i> ';

                        return $star . $project->title.
                                    '<br><a class="btn btn-xs btn-success" href="'.url('project').'/'.$project->id.'"> Details </a>';
                    })
                    ->editColumn('image', function($project){

                        $image = Voyager::image( $project->image );

                        if($image != '')
                        {
                            return "
                                    <a href='".Voyager::image( $project->image )."' data-lightbox='image'  >
                                        <img src='".Voyager::image( $project->image )."' style='width:100px'>
                                    </a>
                                    ";
                        }
                        else
                        {
                            return '';
                        }
                    })
                    ->make(true);

    }

    public function addTag(Request $request)
    {
        

        if($request->has('projects') )
        {
            $tag = $request->has('tag') ? $request->input('tag') : '';
            $projectIDs = $request->input('projects');

            foreach ($projectIDs as $key => $projectID) {

                DB::table('projecttags')
                    ->where('user_id', Auth::user()->id)
                    ->where('project_id', $projectID)
                    ->delete();
                
                DB::table('projecttags')->insert([
                        ['user_id' => Auth::user()->id, 'project_id' => $projectID, 'tag' => $tag]
                    ]);
            }
        }
     
        return back();   
    }

    public function addTag_api(Request $request)
    {
        
        $data = json_decode( $request->getContent(), true ) ;

        $user = \App\User::find( $data['user_id'] );

        $isActive = $user->isActive();

        if($isActive['is_user_active'] == 'false')
        {
            return $isActive;
        }


        $tag = $data['tag'];
        $projectIDs = $data['projects'];

        foreach ($projectIDs as $key => $projectID) {

            DB::table('projecttags')
                ->where('user_id', $data['user_id'] )
                ->where('project_id', $projectID)
                ->delete();
            
            DB::table('projecttags')->insert([
                    ['user_id' => $data['user_id'], 'project_id' => $projectID, 'tag' => $tag]
                ]);
        }
        
     
        return array( 'success' => 'true' );
    }

    public function addNote(Request $request)
    {
        if($request->has('projects') )
        {
            $note = $request->has('note') ? $request->input('note') : '';
            $projectIDs = $request->input('projects');
            $shared = is_numeric($request->input('shared_with_team')) ? $request->input('shared_with_team') : 0;

            foreach ($projectIDs as $key => $projectID) {

                DB::table('projectnotes')
                    ->where('user_id', Auth::user()->id)
                    ->where('project_id', $projectID)
                    ->delete();
                
                if($note != '')
                {
                    DB::table('projectnotes')->insert([
                            ['user_id' => Auth::user()->id, 'project_id' => $projectID, 'note' => $note, 'shared_with_team' => $shared]
                        ]);
                }
            }
        }
     
        return back();  
    }

    public function addNote_api(Request $request)
    {

        $data = json_decode( $request->getContent(), true ) ;

        $user = \App\User::find( $data['user_id'] );

        $isActive = $user->isActive();

        if($isActive['is_user_active'] == 'false')
        {
            return $isActive;
        }
        
        $note = $data['note'];
        $projectIDs = $data['projects'];
        $shared = is_numeric($data['shared_with_team']) ? $data['shared_with_team'] : 0;

        foreach ($projectIDs as $key => $projectID) {

            DB::table('projectnotes')
                ->where('user_id', $data['user_id'])
                ->where('project_id', $projectID)
                ->delete();
            
            if($note != '')
            {
                DB::table('projectnotes')->insert([
                        ['user_id' => $data['user_id'], 'project_id' => $projectID, 'note' => $note, 'shared_with_team' => $shared]
                    ]);
            }
        }
        
     
        return array( 'success' => 'true' );
    }

    public function markFavourite(Request $request)
    {
        if($request->has('projects') )
        {
            $projectIDs = $request->input('projects');

            foreach ($projectIDs as $key => $projectID) {

                DB::table('favouriteprojects')
                    ->where('user_id', Auth::user()->id)
                    ->where('project_id', $projectID)
                    ->delete();
                
                DB::table('favouriteprojects')->insert([
                        ['user_id' => Auth::user()->id, 'project_id' => $projectID]
                    ]);
            }
        }
     
        return back();  
    }

    public function markFavourite_api(Request $request)
    {

        $data = json_decode( $request->getContent(), true ) ;

        $user = \App\User::find( $data['user_id'] );

        $isActive = $user->isActive();

        if($isActive['is_user_active'] == 'false')
        {
            return $isActive;
        }
        
        
        $projectIDs = $data['projects'];

        foreach ($projectIDs as $key => $projectID) {

            DB::table('favouriteprojects')
                ->where('user_id', $data['user_id'])
                ->where('project_id', $projectID)
                ->delete();
            
            DB::table('favouriteprojects')->insert([
                    ['user_id' => $data['user_id'], 'project_id' => $projectID]
                ]);
        }
        
     
        return array( 'success' => 'true' );
    }

    

    public function removeFavourite(Request $request)
    {
        

        

        if($request->has('projects') )
        {
            $projectIDs = $request->input('projects');

            foreach ($projectIDs as $key => $projectID) {

                DB::table('favouriteprojects')
                    ->where('user_id', Auth::user()->id)
                    ->where('project_id', $projectID)
                    ->delete();
            }
        }
     
        return back();
    }

    public function removeFavourite_api(Request $request)
    {
        $data = json_decode( $request->getContent(), true ) ;

        $user = \App\User::find( $data['user_id'] );

        $isActive = $user->isActive();

        if($isActive['is_user_active'] == 'false')
        {
            return $isActive;
        }
        
        
        $projectIDs = $data['projects'];

        
        

        foreach ($projectIDs as $key => $projectID) {

            DB::table('favouriteprojects')
                ->where('user_id', $data['user_id'])
                ->where('project_id', $projectID)
                ->delete();
        }
        
     
        return array( 'success' => 'true' );
    }

    public function show($id)
    {
        

        return view('projects.show', show_project($id) );
    }

    public function show_api()
    {
        $data = json_decode( $request->getContent(), true ) ;

        $user = \App\User::find( $data['user_id'] );

        $isActive = $user->isActive();

        if($isActive['is_user_active'] == 'false')
        {
            return $isActive;
        }

        return array ( 'success' => 'true', 'info' => show_project($data['project_id']) );
    }

    public function show_project($id)
    {
        $project = Project::find($id);

        $isFav = 0;

        if ( count ( DB::table('favouriteprojects')
                    ->where('user_id', Auth::user()->id)
                    ->where('project_id', $project->id)
                    ->first() ) > 0 )
        {
            $isFav = 1;
        }

        $tag = '';

        $tagTable = DB::table('projecttags')
                    ->where('user_id', Auth::user()->id)
                    ->where('project_id', $project->id)
                    ->first();

        if( count( $tagTable ) > 0 )
            $tag = $tagTable->tag;

        $note = '';

        $noteTable = DB::table('projectnotes')
                    ->where('user_id', Auth::user()->id)
                    ->where('project_id', $project->id)
                    ->first();

        if( count( $noteTable ) > 0 )
            $note = $noteTable->note;  

        
        DB::table('recentlyviewedprojects')
                ->insert([
                        ['user_id' => Auth::user()->id, 'project_id' => $project->id ]
                    ]);

        return compact('project', 'isFav', 'tag', 'note');
    }
}
