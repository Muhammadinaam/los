@extends('layouts.layout')

@section('styles')

<link rel="stylesheet" type="text/css" href="{{asset('public/lightbox2/css/lightbox.min.css')}}">

<style type="text/css">
  #map {
        width: 100%;
        height: 400px;
        background-color: grey;
      }
</style>


@endsection

@section('content')





<!-- Modal -->
<div id="myModal_tags" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Tag</h4>
      </div>

      <div class="modal-body">
      
        <form class="form-horizontal" id="add-tag-form" method="post" action="{{url('add-tag')}}">
          <fieldset>

          {{csrf_field()}}

          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="tag">Tag</label>
            <div class="col-md-5">
              <select id="tag" name="tag" class="form-control">
                <option value="">-- No Tag --</option>
                <option value="Actioned">Actioned</option>
                <option value="To Action Now">To Action Now</option>
                <option value="To Action Later">To Action Later</option>
                <option value="Not Relevant">Not Relevant</option>
              </select>
            </div>
          </div>

          <input type="hidden" name="projects[]" value="{{$project->id}}">

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="btn-submit"></label>
            <div class="col-md-4">
              <button type="submit" id="btn-submit" name="btn-submit" class="btn btn-primary">Add Tag</button>
            </div>
          </div>

          </fieldset>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal -->
<div id="myModal_notes" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Note</h4>
      </div>

      <div class="modal-body">
      
        <form class="form-horizontal" id="add-note-form" method="post" action="{{url('add-note')}}">
        {{csrf_field()}}
          <fieldset>
          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="note">Note</label>
            <div class="col-md-8">                     
              <textarea class="form-control" id="note" name="note"></textarea>
            </div>
          </div>

          <!-- Checkbox -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="shared_with_team"></label>
            <div class="col-md-8">                     
              <input type="checkbox" id="shared_with_team" name="shared_with_team" value='1'> Share with Team <br>
            </div>
          </div>

          <input type="hidden" name="projects[]" value="{{$project->id}}">

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-2 control-label" for="btn-submit"></label>
            <div class="col-md-4">
              <button type="submit" id="btn-submit" name="btn-submit" class="btn btn-primary">Add Note</button>
            </div>
          </div>

          </fieldset>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<!-- Mark Favourite Form -->

<form id="mark-favourite-form" method="post" action="{{url('mark-favourite')}}">
{{csrf_field()}}
<input type="hidden" name="projects[]" value="{{$project->id}}">
</form>

<form id="remove-favourite-form" method="post" action="{{url('remove-favourite')}}">
{{csrf_field()}}
<input type="hidden" name="projects[]" value="{{$project->id}}">
</form>






<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center page-content">
        <h1>Project</h1>
        <!-- <p>We have updated list of projects</p> -->
        <div class="page_nav">
      <span>You are here:</span> <a href="{{url('')}}">Home</a> <span><i class="fa fa-angle-double-right"></i>Project</span>
      </div>
      </div>
    </div>
  </div>
</section>


<section id="blog" class="padding">
 <h3 class="hidden">hidden</h3>
 <div class="container">
     <div class="row">
      <div class="col-md-9 col-sm-8">
        <article class="blog_item padding-bottom-half">
          <div class="image half_space">
            @if( $project->image != '' )
              <img src="{{Voyager::image($project->image)}}">
            @endif
          </div>
          <h3>{{$project->title}}</h3>
          


          <p class="margin10">
            {!! $project->description !!}
          </p>

          <br>

          <table class="table">
            <tr>
              <td><b>Industry</b></td><td>{{$project->industry}}</td>
            </tr>
              <td><b>Status</b></td><td>{{$project->status}}</td>
            </tr>
              <td><b>Type</b></td><td>{{$project->type}}</td>
            </tr>
              <td><b>Client</b></td><td>{!! $project->client !!}</td>
            </tr>
              <td><b>Consultant</b></td><td>{!! $project->consultant !!}</td>
            </tr>
              <td><b>Main Contractor</b></td><td>{!! $project->main_contractor !!}</td>
            </tr>
              <td><b>Main Contractor Awarded Date</b></td><td>{{ $project->main_contractor_awarded_date != '' ? \Carbon\Carbon::parse($project->main_contractor_awarded_date)->format('d-M-Y') : '' }}</td>
            </tr>
              <td><b>MEP Contractor</b></td><td>{!! $project->mep_contractor !!}</td>
            </tr>
              <td><b>Main Contractor Awarded Date</b></td><td>{{ $project->mep_contractor_awarded_date != '' ? \Carbon\Carbon::parse($project->mep_contractor_awarded_date)->format('d-M-Y') : '' }}</td>
            </tr>
              <td><b>Construction Start Date</b></td><td>{{ $project->construction_start_date != '' ? \Carbon\Carbon::parse($project->construction_start_date)->format('d-M-Y') : '' }}</td>
            </tr>
              <td><b>Construction End Date</b></td><td>{{ $project->construction_end_date != '' ? \Carbon\Carbon::parse($project->construction_end_date)->format('d-M-Y') : '' }}</td>
            </tr>
              <td><b>Value ($)</b></td><td>{{$project->value}}</td>
            </tr>
              <td><b>No. of Floors</b></td><td>{{$project->num_of_floors}}</td>
            </tr>
              <td><b>No. of Rooms</b></td><td>{{$project->num_of_rooms}}</td>
            </tr>
              <td><b>City</b></td><td>{{$project->city}}</td>
            </tr>
              <td><b>Country</b></td><td>{{$project->country}}</td>
            </tr>
              <td><b>Address</b></td><td>{{$project->address}}</td>
            </tr>
              <td><b>Plot No.</b></td><td>{{$project->plot_number}}</td>
            </tr>
            </tr>
          </table>

          @if($project->map_latitude != '0' && $project->map_longitude != '0' )
            <h2 class="heading half_space">Map Location<span class="divider-left"></span></h2>
            <div id="map"></div>
          @endif
            
        </article>


        

        @if( count($project->updates) > 0 )
         
        <article>
        <h3 class="heading half_space">{{ count($project->updates) }} Updates<span class="divider-left"></span></h3>
        
        @foreach($project->updates()->orderBy('date', 'desc')->get() as $update)
        <div class="media blog-reply half_space">
          <div class="pull-left">
            <a href='{{Voyager::image("$update->image1")}}' data-lightbox='image-{{$update->id}}'>
              <img class="img img-thumbnail" src='{{Voyager::image("$update->image1")}}' style='width:250px;'>
            </a>
          </div>
          <div class="media-body">
            <!-- <h4>AYMAN FIKRY</h4> -->
            <span>{{\Carbon\Carbon::parse($update->date)->format('d-M-Y h:i A')}}</span>
            <p>
              {!! $update->description !!}
            </p>
            
            @if( $update->image2 != '' )
            <a href='{{Voyager::image("$update->image2")}}' data-lightbox='image-{{$update->id}}'>
              <img class="img img-thumbnail" src='{{Voyager::image("$update->image2")}}' style='width:100px;'>
            </a>
            @endif

            @if( $update->image3 != '' )
            <a href='{{Voyager::image("$update->image3")}}' data-lightbox='image-{{$update->id}}'>
              <img class="img img-thumbnail" src='{{Voyager::image("$update->image3")}}' style='width:100px;'>
            </a>
            @endif


          </div>
        </div>
        @endforeach
        
        
        </article>

        @endif

      </div>
      <div class="col-md-3 col-sm-4">
        <aside class="sidebar bg_grey border-radius">
          <div class="widget heading_space">

            <button id="btn-add-tags" class="btn btn-default"> <i class="fa fa-tag" aria-hidden="true"></i></button>
          <button id="btn-add-notes" class="btn btn-default"> <i class="fa fa-sticky-note" aria-hidden="true"></i></button>
          <button id="btn-mark-favourite" class="btn btn-default"> <i class="fa fa-star" aria-hidden="true"></i></button>

            <br><br>

            <table class="table">
              <tr>
                <td>Favourite</td>
                <td>
                  <b>
                    @if($isFav == '1')
                      <i style="color:blue;" class="fa fa-star" aria-hidden="true"></i> Yes
                    @else
                      No
                    @endif
                  </b>
                </td>
              </tr>
              <tr>
                <td>Tag</td><td><b>{{$tag}}</b></td>
              </tr>
            </table>


            @if($note != '')
            <h3 class="heading half_space">Note<span class="divider-left"></span></h3>
            <div style="background-color: white; padding: 10px;">{{$note}}</div>
            @endif

          </div>
          <div class="widget heading_space">
            <h3 class="heading half_space">Categories<span class="divider-left"></span></h3>
             <ul class="category">
              <li><a href="#.">Tiling & Painting</a></li>
              <li><a href="#.">Renovations</a></li>
              <li><a href="#.">Design & Build</a></li>
              <li><a href="#.">Consulting</a></li>
              <li><a href="#.">Management</a></li>
              <li><a href="#.">Wood Flooring</a></li>
            </ul>
          </div>
          <div class="widget heading_space">
            <h3 class="heading half_space">Recent Posts<span class="divider-left"></span></h3>
            <div class="single_post">
            <img src="images/post1.jpg" alt="post image">
            <p>in: Tips , Advice</p>
            <a href="#.">Before Making your Dream Room</a>
            </div>
            <div class="single_post margin10">
            <img src="images/post2.jpg" alt="post image">
            <p>in: Tips , Advice</p>
            <a href="#.">Before Making your Dream Room</a>
            </div>
            <div class="single_post margin10">
            <img src="images/post3.jpg" alt="post image">
            <p>in: Tips , Advice</p>
            <a href="#.">Before Making your Dream Room</a>
            </div>
          </div>
          <div class="widget">
            <h3 class="heading half_space">Popular Tags<span class="divider-left"></span></h3>
            <ul class="tags">
             <li><a href="#." class="border-radius">Dream room</a></li>
              <li><a href="#." class="border-radius">Fresh</a></li>
              <li><a href="#." class="border-radius">Theory</a></li>
              <li><a href="#." class="border-radius">Responsive</a></li>
              <li><a href="#." class="border-radius">Wordpress Template</a></li>
              <li><a href="#." class="border-radius">Modern</a></li>
              <li><a href="#." class="border-radius">Business</a></li>
              <li><a href="#." class="border-radius">Wood</a></li>
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </div>
</section>





@endsection

@section('scripts')

@if($project->map_latitude != '0' && $project->map_longitude != '0' )
<script>
  function initMap() {
    var location = {lat: {{$project->map_latitude}}, lng: {{$project->map_longitude}}};
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 15,
      center: location
    });
    var marker = new google.maps.Marker({
      position: location,
      map: map
    });
  }
</script>
<script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyYnVu3EY9FMV1c6CJ2zdDhLaLjmBY5xY&callback=initMap">
</script>
@endif


<script type="text/javascript" src="{{asset('public/lightbox2/js/lightbox.min.js')}}" ></script>


<script type="text/javascript">


  $(document).ready(function(){


    $('#btn-add-tags').click(function(){

      if($('#add-tag-form [name="projects[]"]').length > 0)
      {
        $('#myModal_tags').modal('show', {backdrop: 'static', keyboard: false});
      }
      else
      {
        alert('Please select one or more projects!');
      }
    });

    $('#btn-add-notes').click(function(){

      if($('#add-note-form [name="projects[]"]').length > 0)
      {
        $('#myModal_notes').modal('show', {backdrop: 'static', keyboard: false});
      }
      else
      {
        alert('Please select one or more projects!');
      } 

    });

    $('#btn-mark-favourite').click(function(){

      if($('#mark-favourite-form [name="projects[]"]').length > 0)
      {
        $('#mark-favourite-form').submit();
      }
      else
      {
        alert('Please select one or more projects!');
      } 

    });

      

  });

</script>



@endsection