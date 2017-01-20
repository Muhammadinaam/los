@extends('layouts.layout')

@section('styles')

<link rel="stylesheet" type="text/css" href="{{asset('public/lightbox2/css/lightbox.min.css')}}">

@endsection

@section('content')

<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center page-content">
        <h1>Dashboard</h1>
        <!-- <p>We have updated list of projects</p> -->
        <div class="page_nav">
      <span>You are here:</span> <a href="{{url('')}}">Home</a> <span><i class="fa fa-angle-double-right"></i>Dashboard</span>
      </div>
      </div>
    </div>
  </div>
</section>

<br><br><br>

<section>
  <div class="container">
    <div class="row">
      
      <div class="col-md-6">
      
      	<div class="panel panel-info">
		  <div class="panel-heading">Recently Viewed Projects</div>
		  <div class="panel-body">

		  	<?php
		  		$recentlyViewed = DB::table('recentlyviewedprojects')
		  							->leftJoin('projects', 'projects.id', '=', 'recentlyviewedprojects.project_id')
		  							->where('recentlyviewedprojects.user_id', Auth::user()->id)
		  							->orderBy('recentlyviewedprojects.created_at', 'desc')
		  							->limit(5)
		  							->get();
		  	?>

		  	

		  	<table>
		  		@foreach($recentlyViewed as $project)
		  		<tr style="border-bottom: 1px solid lightgray;">
		  			<td class="col-md-4">
			  			@if($project->image != '')
					  	<a href='{{Voyager::image("$project->image")}}' data-lightbox='image-recent-{{$project->id}}'>
			              <img class="img img-thumbnail" src='{{Voyager::image("$project->image")}}' style='width:150px;'>
			            </a>
			            @endif
			        </td>
		  			<td class="col-md-8">
		  				<b><a style="text-decoration: underline;" href="{{url('project') .'/'. $project->id  }}">{{$project->title}}</a></b>
			            <br>
			            <small>
				            {{$project->address}}<br>
				            {{$project->city}}<br>
				            {{$project->country}}
				        </small>
		  			</td>
		  		</tr>
		  		@endforeach
		  	</table>

		  	

	        
            
            

		  </div>
		</div>

      </div>

      <div class="col-md-6">
      
		<div class="panel panel-primary">
		  <div class="panel-heading">Trending Projects</div>
		  <div class="panel-body">Panel Content</div>
		</div>      	

      </div>

      <div class="col-md-6">
      
      	<div class="panel panel-danger">
		  <div class="panel-heading">Popular Projects</div>
		  <div class="panel-body">Panel Content</div>
		</div>

      </div>

      <div class="col-md-6">
      
      	<div class="panel panel-success">
		  <div class="panel-heading">Projects with Tag [To Action Now]</div>
		  <div class="panel-body">Panel Content</div>
		</div>

      </div>


    </div>
  </div>
</section>

<br><br><br>


@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('public/lightbox2/js/lightbox.min.js')}}" ></script>
@endsection