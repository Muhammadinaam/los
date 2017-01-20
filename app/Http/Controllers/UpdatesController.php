<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Datatables;
use Voyager;

class UpdatesController extends Controller
{
    //

	public function index()
    {
        $dataType = \TCG\Voyager\Models\DataType::where('slug', '=', 'updates')->first();

        return view('vendor.voyager.updates.browse', compact('dataType') );
    }

    public function datatable()
    {
        
        $query = DB::table('updates')
                        ->join('projects', 'updates.project_id', '=', 'projects.id' )
                        ->select('updates.id', 'updates.date', 'updates.description', 'updates.image1', 'updates.image2', 'updates.image3', 'projects.title' );

        return Datatables::of($query)
            ->editColumn('image1', function($update){
                return "<img src='".Voyager::image( $update->image1 )."' style='width:100px'>";
            })
            ->editColumn('image2', function($update){
                return "<img src='".Voyager::image( $update->image2 )."' style='width:100px'>";
            })
            ->editColumn('image3', function($update){
                return "<img src='".Voyager::image( $update->image3 )."' style='width:100px'>";
            })
            ->addColumn('action', function($update){
                return '<div class="btn-sm btn-danger pull-right delete" data-id="'.$update->id.'" id="delete-'.$update->id.'">
                                            <i class="voyager-trash"></i>
                                        </div>
                                        <a href="'.route('voyager.updates.edit', $update->id).'" class="btn-sm btn-primary pull-right edit">
                                            <i class="voyager-edit"></i>
                                        </a>
                                        <a href="'.route('voyager.updates.show', $update->id).'" class="btn-sm btn-warning pull-right">
                                            <i class="voyager-eye"></i>
                                        </a>';
            })
            ->make(true);
    }

    public function indexNonAdmin()
    {

        return view( 'updates.index' );
    }

    public function datatableNonAdmin()
    {
        
        $query = DB::table('updates')
                        ->join('projects', 'updates.project_id', '=', 'projects.id' )
                        ->orderBy('updates.date', 'desc')
                        ->select('updates.id', 'updates.date', 'updates.description', 'updates.image1', 'updates.image2', 'updates.image3', 'projects.title' );

        return Datatables::of($query)
            ->editColumn('image1', function($update){

                $image = Voyager::image($update->image1);

                if($image != '')
                {
                    return "
                            <a href='".Voyager::image( $update->image1 )."' data-lightbox='image".$update->id."'  >
                                <img src='".Voyager::image( $update->image1 )."' style='width:100px'>
                            </a>
                            ";
                }
                else
                {
                    return '';
                }
            })
            ->editColumn('image2', function($update){

                $image = Voyager::image($update->image2);

                if($image != '')
                {
                    return "
                            <a href='".Voyager::image( $update->image2 )."' data-lightbox='image".$update->id."'  >
                                <img src='".Voyager::image( $update->image2 )."' style='width:100px'>
                            </a>
                            ";
                }
                else
                {
                    return '';
                }
            })
            ->editColumn('image3', function($update){

                $image = Voyager::image($update->image3);

                if($image != '')
                {
                    return "
                            <a href='".Voyager::image( $update->image3 )."' data-lightbox='image".$update->id."'  >
                                <img src='".Voyager::image( $update->image3 )."' style='width:100px'>
                            </a>
                            ";
                }
                else
                {
                    return '';
                }
            })
            ->editColumn('date', function($update){
                return \Carbon\Carbon::parse($update->date)->format('d-M-Y');
            })
            ->make(true);
    }

}
