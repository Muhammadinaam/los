@extends('layouts.layout')

@section('styles')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/lightbox2/css/lightbox.min.css')}}">

<style type="text/css">
th
{
   background-color: #F9F9F9 !important;
}
</style>

@endsection

@section('content')



<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center page-content">
        <h1>Projects</h1>
        <!-- <p>We have updated list of projects</p> -->
        <div class="page_nav">
      <span>You are here:</span> <a href="{{url('')}}">Home</a> <span><i class="fa fa-angle-double-right"></i>Projects</span>
      </div>
      </div>
    </div>
  </div>
</section>


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
</form>

<form id="remove-favourite-form" method="post" action="{{url('remove-favourite')}}">
{{csrf_field()}}
</form>



<!--SERVICE SECTION-->
<section id="projects" style="padding: 20px 50px 0px 50px;">

      
      <div style="padding-left: 15px;" class="row">

        <div class="col-md-3 pull-right">

            <div class="panel-group">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse" href="#collapse1"> <i class="fa fa-filter" aria-hidden="true"></i> Filter</a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse">
                  <div class="panel-body">

                    <!-- Multiple Checkboxes -->
                    <div class="form-group filterbox">
                      <div class="col-md-12">
                      <div class="checkbox">
                        <label for="show_by_tags-0">
                          <input type="checkbox" id="actioned" value="actioned" checked>
                          Actioned
                        </label>
                      </div>
                      <div class="checkbox">
                        <label for="show_by_tags-1">
                          <input type="checkbox" id="to_action_now" value="to_action_now" checked>
                          To Action Now
                        </label>
                      </div>
                      <div class="checkbox">
                        <label for="show_by_tags-2">
                          <input type="checkbox" id="to_action_later" value="to_action_later" checked>
                          To Action Later
                        </label>
                      </div>
                      <div class="checkbox">
                        <label for="show_by_tags-3">
                          <input type="checkbox" id="not_relevant" value="not_relevant" checked>
                          Not Relevant
                        </label>
                      </div>
                      <div class="checkbox">
                        <label for="show_by_tags-4">
                          <input type="checkbox" id="projects_with_notes" value="projects_with_notes">
                          Projects with notes
                        </label>
                      </div>

                      <div class="checkbox">
                        <label for="show_by_tags-5">
                          <input type="checkbox" id="favourite_projects" value="favourite_projects">
                          Favourite Projects
                        </label>
                      </div>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            


          </div>

        
          <button id="btn-add-tags" class="btn btn-default"> <i class="fa fa-tag" aria-hidden="true"></i> Add Tag</button>
          <button id="btn-add-notes" class="btn btn-default"> <i class="fa fa-sticky-note" aria-hidden="true"></i> Add Note</button>
          <button id="btn-mark-favourite" class="btn btn-default"> <i class="fa fa-star" aria-hidden="true"></i> Mark Favourite</button>
          <button id="btn-mark-favourite" class="btn btn-default"> <i class="fa fa-star-half-o" aria-hidden="true"></i> Remove Favourite Mark</button>

        </div>
      
        

        <div class="panel panel-bordered">



          <table id="projects-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th></th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Industry</th>
                <th>Type</th>
                <th>Country</th>
                <th>City</th>
                <th>Address</th> 
                <th>Client</th>         
                <th>Consultant</th>         
                <th>Contractor</th>         
                <th>Tags</th>
                <th>Notes</th>
              </tr>
            </thead>
          </table>

        </div>

      
</section>




@endsection

@section('scripts')

<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="{{asset('public/lightbox2/js/lightbox.min.js')}}" ></script>


<script type="text/javascript">


  $(document).ready(function(){

    var table = $('#projects-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              "url": '{{url("projects-datatable")}}',
              "type": "GET",
              "data": function(d){
                return $.extend( {}, d, {
                  "actioned": $('#actioned:checked').length,
                  "to_action_now": $('#to_action_now:checked').length,
                  "to_action_later": $('#to_action_later:checked').length,
                  "not_relevant": $('#not_relevant:checked').length,
                  "projects_with_notes": $('#projects_with_notes:checked').length,
                  "favourite_projects": $('#favourite_projects:checked').length,
                } );
              },
            },
            responsive: true,
            "scrollX": true,
            columns: [
                { data: 'select', name: 'select', searchable: false, orderable: false },
                { data: 'title', name: 'projects.title' },
                { data: 'image', name: 'projects.image', searchable: false, orderable: false  },
                { data: 'status', name: 'projects.status' },
                { data: 'industry', name: 'projects.industry' },
                { data: 'type', name: 'projects.type' },
                { data: 'country', name: 'projects.country' },
                { data: 'city', name: 'projects.city' },
                { data: 'address', name: 'projects.address' },
                { data: 'client', name: 'projects.client' },
                { data: 'consultant', name: 'projects.consultant' },
                { data: 'main_contractor', name: 'projects.main_contractor' },
                { data: 'tag', name: 'projecttags.tag' },
                { data: 'note', name: 'projectnotes.note' },
            ]
        });


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

    $(document).on('change', ".filterbox input[type='checkbox']", function(){
      table.draw();
    });

    $(document).on('change', "#projects-table input[type='checkbox']", function(){

      $('#add-tag-form #id-' + $(this).attr('id')).remove();
      $('#add-note-form #id-' + $(this).attr('id')).remove();
      $('#mark-favourite-form #id-' + $(this).attr('id')).remove();

      if(this.checked) {

            $('#add-tag-form').append('<input id="id-'+$(this).attr('id')+'" type="hidden" name=projects[] value="'+$(this).attr('id')+'">');
            $('#add-note-form').append('<input id="id-'+$(this).attr('id')+'" type="hidden" name=projects[] value="'+$(this).attr('id')+'">');
            $('#mark-favourite-form').append('<input id="id-'+$(this).attr('id')+'" type="hidden" name=projects[] value="'+$(this).attr('id')+'">');
        }
    });

    function pulse() {
        $('.blink').fadeTo(300, 0.3);
        $('.blink').fadeTo(500, 1);
    }
    setInterval(pulse, 1000);

  });

</script>

@endsection