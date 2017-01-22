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
        <h1>Project Updates</h1>
        <!-- <p>We have updated list of projects</p> -->
        <div class="page_nav">
      <span>You are here:</span> <a href="{{url('')}}">Home</a> <span><i class="fa fa-angle-double-right"></i>Project Updates</span>
      </div>
      </div>
    </div>
  </div>
</section>






<!--SERVICE SECTION-->
<section id="updates" style="padding: 20px 50px 0px 50px;">

      
      
        

        <div class="panel panel-bordered">



          <table id="updates-table" class="table table-bordered" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th>Project</th>
                <th>Date</th>
                <th>Description</th>
                <th>Image 1</th>
                <th>Image 2</th>
                <th>Image 3</th>
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

    var table = $('#updates-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              "url": '{{url("project-updates-datatable")}}',
              "type": "GET",
              "data": function(d){
                return $.extend( {}, d, {
                  // "actioned": $('#actioned:checked').length,
                  // "to_action_now": $('#to_action_now:checked').length,
                  // "to_action_later": $('#to_action_later:checked').length,
                  // "not_relevant": $('#not_relevant:checked').length,
                  // "projects_with_notes": $('#projects_with_notes:checked').length,
                  // "favourite_projects": $('#favourite_projects:checked').length,
                } );
              },
            },
            responsive: true,
            "scrollX": true,
            columns: [
                { data: 'title', name: 'projects.title' },
                { data: 'date', name: 'updates.date' },
                { data: 'description', name: 'updates.description' },
                { data: 'image1', name: 'updates.image1' },
                { data: 'image2', name: 'updates.image2' },
                { data: 'image3', name: 'updates.image3' },
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

    $('#btn-remove-favourite').click(function(){

      if($('#remove-favourite-form [name="projects[]"]').length > 0)
      {
        $('#remove-favourite-form').submit();
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
      $('#remove-favourite-form #id-' + $(this).attr('id')).remove();

      if(this.checked) {

            $('#add-tag-form').append('<input id="id-'+$(this).attr('id')+'" type="hidden" name=projects[] value="'+$(this).attr('id')+'">');
            $('#add-note-form').append('<input id="id-'+$(this).attr('id')+'" type="hidden" name=projects[] value="'+$(this).attr('id')+'">');
            $('#mark-favourite-form').append('<input id="id-'+$(this).attr('id')+'" type="hidden" name=projects[] value="'+$(this).attr('id')+'">');
            $('#remove-favourite-form').append('<input id="id-'+$(this).attr('id')+'" type="hidden" name=projects[] value="'+$(this).attr('id')+'">');
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