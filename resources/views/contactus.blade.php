@extends('layouts.layout')

@section('styles')




@endsection

@section('content')



<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center page-content">
        <h1>Contact Us</h1>
        <!-- <p>We offer the most complete house renovating services in the country</p> -->
        <div class="page_nav">
      <span>You are here:</span> <a href="{{url('')}}">Home</a> <span><i class="fa fa-angle-double-right"></i>Contact Us</span>
      </div>
      </div>
    </div>
  </div>
</section>




<!--Contact Deatils SECTION-->
<section id="contact" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 contact_address heading_space">
      <h2 class="heading heading_space">Get in Touch <span class="divider-left"></span></h2>
      <p>Reach us on (+971) 111-222-333 in the UAE</p>

        <div class="row">
      

          <div class="col-md-4">
            <div class="address">
              <i class="icon icon-map-pin"></i>
              <h4>Visit Us</h4>
              <p>Union, United Arab Emirates</p>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="address">
              <i class="icon icon-mail"></i>
              <h4>Email Us</h4>
              <p><a href="mailto:info@leadsonsite.com">info@leadsonsite.com</a></p>
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="address">
              <i class="icon icon-phone4"></i>
              <h4>Call Us</h4>
              <p>(971) 111 222 333</p>
            </div>
          </div>

        </div>

      </div>
      
    </div>
    <div class="row">
      <div class="col-md-12">
        <div id="map_canvas"></div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('scripts')

<script>
  function initMap() {
    var location = {lat: 25.2317, lng: 55.3240};
    var map = new google.maps.Map(document.getElementById('map_canvas'), {
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

@endsection