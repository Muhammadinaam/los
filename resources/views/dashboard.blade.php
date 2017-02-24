@extends('layouts.layout')

@section('styles')

<link rel="stylesheet" type="text/css" href="{{asset('public/lightbox2/css/lightbox.min.css')}}">

<style type="text/css">
	
	.panel-danger .panel-heading 
	{
		background-color: red!important;
		color:white;
	}

	.panel-success .panel-heading 
	{
		background-color: green!important;
		color:white;
	}

	.panel-info .panel-heading 
	{
		background-color: yellow!important;
		color:black;
		border-color: yellow;
	}

	.panel-info
	{
		border-color: yellow;
	}

	.panel
	{
		-webkit-box-shadow: -2px -1px 18px 1px rgba(219,219,219,1);
		-moz-box-shadow: -2px -1px 18px 1px rgba(219,219,219,1);
		box-shadow: -2px -1px 18px 1px rgba(219,219,219,1);
	}

</style>

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
      
      	<div class="panel panel-primary">
		  <div class="panel-heading"> <i class="fa fa-clock-o" aria-hidden="true"></i> Recently Viewed Projects</div>
		  <div class="panel-body">


		  	

		  	<table>
		  		@foreach($recentlyViewed as $project)
		  		<tr style="border-bottom: 1px solid lightgray;">
		  			<td style="padding:10px;" class="col-md-4">
			  			@if($project->image != '')
					  	<a href='{{Voyager::image("$project->image")}}' data-lightbox='image-recent-{{$project->id}}'>
			              <img class="img img-thumbnail" src='{{Voyager::image("$project->image")}}' style='width:150px;'>
			            </a>
			            @endif
			        </td>
		  			<td style="padding:10px;" class="col-md-8">
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
      
		<div class="panel panel-info">
		  <div class="panel-heading"> <i class="fa fa-line-chart" aria-hidden="true"></i> Trending Projects</div>
		  <div class="panel-body">
		  	
		  	

		  	

		  	<table>
		  		@foreach($trendingProjects as $project)
		  		<tr style="border-bottom: 1px solid lightgray;">
		  			<td style="padding:10px;" class="col-md-4">
			  			@if($project->image != '')
					  	<a href='{{Voyager::image("$project->image")}}' data-lightbox='image-trending-{{$project->id}}'>
			              <img class="img img-thumbnail" src='{{Voyager::image("$project->image")}}' style='width:150px;'>
			            </a>
			            @endif
			        </td>
		  			<td style="padding:10px;" class="col-md-8">
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
      
      	<div class="panel panel-danger">
		  <div class="panel-heading"> <i class="fa fa-star-o" aria-hidden="true"></i> Most Favourite Projects</div>
		  <div class="panel-body">

		  	

		  	

		  	<table>
		  		@foreach($mostFavouriteProjects as $project)
		  		<tr style="border-bottom: 1px solid lightgray;">
		  			<td style="padding:10px;" class="col-md-4">
			  			@if($project->image != '')
					  	<a href='{{Voyager::image("$project->image")}}' data-lightbox='image-fav-{{$project->id}}'>
			              <img class="img img-thumbnail" src='{{Voyager::image("$project->image")}}' style='width:150px;'>
			            </a>
			            @endif
			        </td>
		  			<td style="padding:10px;" class="col-md-8">
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
      
      	<div class="panel panel-success">
		  <div class="panel-heading"> <i class="fa fa-tag" aria-hidden="true"></i> Projects with Tag [To Action Now]</div>
		  <div class="panel-body">

		  	

		  	

		  	<table>
		  		@foreach($toActionNowProjects as $project)
		  		<tr style="border-bottom: 1px solid lightgray;">
		  			<td style="padding:10px;" class="col-md-4">
			  			@if($project->image != '')
					  	<a href='{{Voyager::image("$project->image")}}' data-lightbox='image-fav-{{$project->id}}'>
			              <img class="img img-thumbnail" src='{{Voyager::image("$project->image")}}' style='width:150px;'>
			            </a>
			            @endif
			        </td>
		  			<td style="padding:10px;" class="col-md-8">
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


    </div>
  </div>
</section>

<br><br><br>


@endsection

@section('scripts')
<script type="text/javascript" src="{{asset('public/lightbox2/js/lightbox.min.js')}}" ></script>
@endsection