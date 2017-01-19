@extends('layouts.layout')

@section('styles')


<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/lightbox2/css/lightbox.min.css')}}">

.display th
{
   background-color: lightgray !important;
}

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
          <!-- Select Basic -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="tag">Tag</label>
            <div class="col-md-5">
              <select id="tag" name="tag" class="form-control">
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
              <button type="button" id="btn-submit" name="btn-submit" class="btn btn-primary">Add Tag</button>
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
          <fieldset>
          <!-- Textarea -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="note">Note</label>
            <div class="col-md-4">                     
              <textarea class="form-control" id="note" name="note"></textarea>
            </div>
          </div>

          <!-- Button -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="btn-submit"></label>
            <div class="col-md-4">
              <button type="button" id="btn-submit" name="btn-submit" class="btn btn-primary">Add Note</button>
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



<!--SERVICE SECTION-->
<section id="projects" style="padding: 20px 50px 0px 50px;">
  

      <div class="btn-group">
        <button id="btn-add-tags" class="btn btn-primary">Add Tag to Selected Projects</button>
        <button id="btn-add-notes" class="btn btn-success">Add Notes to Selected Projects</button>
      </div>
        
          


          <br><br>

        <div class="panel panel-bordered">



          <table id="projects-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th></th>
                <th bgcolor="lightgray" >Title</th>
                <th bgcolor="lightgray" >Image</th>
                <th bgcolor="lightgray" >Status</th>
                <th bgcolor="lightgray" >Industry</th>
                <th bgcolor="lightgray" >Type</th>
                <th bgcolor="lightgray" >Country</th>
                <th bgcolor="lightgray" >City</th>
                <th bgcolor="lightgray" >Address</th> 
                <th bgcolor="lightgray" >Client</th>         
                <th bgcolor="lightgray" >Consultant</th>         
                <th bgcolor="lightgray" >Contractor</th>         
                <th bgcolor="lightgray" >Tags</th>
                <th bgcolor="lightgray" >Notes</th>
              </tr>
            </thead>
          </table>

        </div>

      
</section>




@endsection

@section('scripts')

<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('public/lightbox2/js/lightbox.min.js')}}" ></script>


<script type="text/javascript">


  $(document).ready(function(){

    $('#projects-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{url("projects-datatable")}}',
            responsive: true,
            fixedHeader: true,
            "scrollX": true,
            columns: [
                { data: 'select', name: 'select', searchable: false, orderable: false },
                { data: 'title', name: 'projects.title' },
                { data: 'image', name: 'projects.image' },
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
      $('#myModal_tags').modal('show', {backdrop: 'static', keyboard: false});
    });

    $(document).on('change', "input[type='checkbox']", function(){

      $('#add-tag-form #' + $(this).attr('id')).remove();
      $('#add-note-form #' + $(this).attr('id')).remove();

      if(this.checked) {

            $('#add-tag-form').append('<input id="'+$(this).attr('id')+'" type="hidden" name=projects[] value="'+$(this).attr('id')+'">');
            $('#add-note-form').append('<input id="'+$(this).attr('id')+'" type="hidden" name=projects[] value="'+$(this).attr('id')+'">');

        }
    });

  });

</script>

@endsection