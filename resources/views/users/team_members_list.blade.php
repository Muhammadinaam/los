@extends('layouts.layout')

@section('styles')

<style type="text/css">
  
</style>


@endsection

@section('content')



<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center page-content">
        <h1>Team Members</h1>
        <!-- <p>We offer the most complete house renovating services in the country</p> -->
        <div class="page_nav">
      <span>You are here:</span> <a href="{{url('')}}">Home</a> <span><i class="fa fa-angle-double-right"></i>Team Members</span>
      </div>
      </div>
    </div>
  </div>
</section>




<section id="contact" class="padding">
  <div class="container">
    <div class="row padding-bottom">
      
      <a class="btn btn-primary" href="add-team-member"> <i class="fa fa-plus-circle" aria-hidden="true"></i> Add Team Member</a>

      <br><br>

      <table class="table table-bordered">
        <thead>
          <tr>
            <td>Name</td>
            <td>Email</td>
            <td>Telephone</td>
            <td>Mobile</td>
            <td>Action</td>
          </tr>
        </thead>

        <tbody>
          @foreach($teamMembers as $teamMember)
          <tr>
            <td>{{$teamMember->name}}</td>
            <td>{{$teamMember->email}}</td>
            <td>{{$teamMember->telephone}}</td>
            <td>{{$teamMember->mobile}}</td>
            <td>
              <form method="post" action="{{url('delete-team-member')}}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$teamMember->id}}">
                <button class="btn btn-danger" > <i class="fa fa-trash" aria-hidden="true"></i> </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>

      </table>


    </div>
  </div>
</section>

@endsection

@section('scripts')

<script>

</script>

@endsection