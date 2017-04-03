@extends('layouts.layout')

@section('styles')

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.dataTables.min.css">



@endsection

@section('content')



<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center page-content">
        <h1>Projects</h1>
        <p>We have updated list of projects</p>
        <div class="page_nav">
      <span>You are here:</span> <a href="{{url('')}}">Home</a> <span><i class="fa fa-angle-double-right"></i>Projects</span>
      </div>
      </div>
    </div>
  </div>
</section>




<!--SERVICE SECTION-->
<section id="projects" class="padding">
  <div class="container">
     <div class="row">
      <div class="col-md-12 text-center">
        <h2 class="heading heading_space">Projects <br><small>Sign in to view complete detail of projects</small><span class="divider-center"></span></h2>
        
      </div>
    </div>
     <div class="row">
      

      <div style="padding:10px;" class="panel panel-bordered">


        <table id="projects-table" class="ui celled table" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Title</th>
              <th>Industry</th>
              <th>Type</th>
              <th>Country</th>
              <th>City</th>
              <th>Address</th>          
            </tr>
          </thead>
        </table>

      </div>


      </div> 
  </div>
</section>




@endsection

@section('scripts')

<script type="text/javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>



<script type="text/javascript">

  $(document).ready(function(){

    $('#projects-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{url("guest/projects-datatable")}}',
            responsive: true,
            "scrollX": true,
            columns: [
                { data: 'title', name: 'projects.title' },
                { data: 'industry', name: 'projects.industry' },
                { data: 'type', name: 'projects.type' },
                { data: 'country', name: 'projects.country' },
                { data: 'city', name: 'projects.city' },
                { data: 'address', name: 'projects.address' },
            ]
        });

  });

</script>

@endsection