@extends('layouts.layout')


@section('content')

<!--Slider-->
<section class="mbr-section mbr-section-hero mbr-section-full mbr-parallax-background mbr-section-with-arrow mbr-after-navbar" id="header1-8" style="background-image: url({{asset('public/theme/images/banner2.jpg')}});">

    

    <div class="mbr-table-cell">

        <div class="container">
            <div class="row">
                <div class="mbr-section col-md-10 col-md-offset-1 text-xs-center">

                    <h1 class="mbr-section-title display-1">LEADS ON SITE</h1>
                    <p class="mbr-section-lead lead">Follow projects from early planning stages till it is under construction and completed, we will keep you up-to-date with all major events during each stage..</p>
                    <div class="mbr-section-btn"><a class="btn btn-lg btn-primary"
                    href="{{ Auth::check() ? url('search-projects') : url('guest/projects') }}">PROJECTS</a> </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mbr-arrow mbr-arrow-floating" aria-hidden="true"><a href="#next"><i class="mbr-arrow-icon"></i></a></div>

</section>
<!-- Slider End -->
    


<!--ABout US-->
<section id="about" class="padding-bottom">
  <div class="container">
    <div class="col-md-4 col-sm-4 about_box">
      <div class="row">
       <img src="{{asset('public/theme/images/detail1.jpg')}}" alt="About Us" class="img-responsive detail">
       <div class="effect text-center">
         <img src="{{asset('public/theme/images/detail-icon1.png')}}" alt="renovation">
         <h3>House Renovation</h3>
         <p class="margin10">We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
       </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 about_box active">
      <div class="row">
       <img src="{{asset('public/theme/images/detail2.jpg')}}" alt="About Us" class="img-responsive detail">
       <div class="effect  text-center">
         <img src="{{asset('public/theme/images/detail-icon2.png')}}" alt="renovation">
         <h3>House Renovation</h3>
         <p class="margin10">We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
       </div>
      </div>
    </div>
    <div class="col-md-4 col-sm-4 about_box">
      <div class="row">
       <img src="{{asset('public/theme/images/detail3.jpg')}}" alt="About Us" class="img-responsive detail">
       <div class="effect  text-center">
         <img src="{{asset('public/theme/images/detail-icon3.png')}}" alt="renovation">
         <h3>House Renovation</h3>
         <p class="margin10">We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
       </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-7 col-sm-6 priorty">
        <h2 class="heading half_space">About Us and Our Priorities <span class="divider-left"></span></h2>
        <p class="half_space">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <p>consectetur id. Aenean sit amet massa eu velit commodo cursus fringilla a tellus. Morbi eros urna, mollis porta feugiat non, ornare eu augue. 
        Sed rhoncus est sit amet diam tempus, et tristique est viverra. Etiam ex tellus, sectur at dapibus id, luctus at odio. Proin mattis congue tristique 
        eu augue. Sed rhoncus est.</p>
        <div class="row">
          <div class="col-md-6">
            <div class="about-post">
            <a href="#." class="border-radius"><img src="{{asset('public/theme/images/hands.png')}}" alt="hands"></a>
            <h4>Good Planning</h4>
            <p>Renean sit amet massa</p>
            </div>
            <div class="about-post">
            <a href="#." class="border-radius"><img src="{{asset('public/theme/images/awesome.png')}}" alt="hands"></a>
            <h4>Awesome Stuff</h4>
            <p>Renean sit amet massa</p>
            </div>
          </div>
          <div class="col-md-6">
            <div class="about-post">
            <a href="#." class="border-radius"><img src="{{asset('public/theme/images/maintenance.png')}}" alt="hands"></a>
            <h4>Maintanance</h4>
            <p>Renean sit amet massa</p>
            </div>
            <div class="about-post">
            <a href="#." class="border-radius"><img src="{{asset('public/theme/images/home.png')}}" alt="hands"></a>
            <h4>Construction</h4>
            <p>Renean sit amet massa</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 col-sm-6">
         <img src="{{asset('public/theme/images/about.jpg')}}" alt="our priorties" class="img-responsive" style="width:100%;">
      </div>
    </div>
  </div>
</section>


<?php
  $slider_images = \App\Sliderimage::all();
?>

@if( count($slider_images) > 0 )
<!--What WE Do-->
<section id="wedo" class="padding bg_grey">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <!-- <h2 class="heading heading_space">What We Do <span class="divider-left"></span></h2> -->
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="slider_wrapper">
          <div id="do-slider" class="owl-carousel">
            

            @foreach( $slider_images as $slider_image )
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{Voyager::image($slider_image->image)}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <h3><a href="#">{{$slider_image->title}}</a></h3>
                <p>{{$slider_image->description}}</p> 
                <!-- <a href="blog_detail.html" class="btn-light border-radius button-hover">service detail</a> -->
              </div>
            </div>
            @endforeach
            
            
            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif



<!--Fun Facts-->
<section id="facts" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
       <h2 class="heading">Leading the way in building and civil construction <span class="divider-center"></span></h2>
       <p class="heading_space margin10">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div>
    </div>
    <div class="row number-counters">
      <div class="col-md-2 col-sm-4">
        <div class="counters-item">
        <i class="icon-checkmark3"></i>
        <strong data-to="1235">0</strong>
        <!-- Set Your Number here. i,e. data-to="56" -->
        <p>Projects</p>
        </div>
        <div class="counters-item last">
        <i class="icon-trophy"></i>
        <strong data-to="78">0</strong>
        <p>Updates</p>
        </div>
      </div>
      <div class="col-md-7 col-sm-4">
        <div class="fact-image">
        <img src="{{asset('public/theme/images/fun-facts.png')}}" alt=" some facts" class="img-responsive">
        </div>
      </div>
      <div class="col-md-3 col-sm-4">
       <div class="counters-item">
        <i class=" icon-icons20"></i>
        <strong data-to="186">0</strong>
        <p>$ Million of projects </p>
        </div>
        <div class="counters-item last">
        <i class="icon-happy"></i>
        <strong data-to="89">0</strong>
        <p>Satisfied Clients</p>
        </div>
      </div>
    </div>
  </div>
</section>

<?php
    $recentProjects = \App\Project::latest()->limit(5)->get();
?>


@if( count($recentProjects) > 0 )
<section id="wedo" class="padding bg_grey">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <h2 class="heading heading_space">Recent Projects <span class="divider-left"></span></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="slider_wrapper">
          <div id="do-slider" class="owl-carousel">
            
            @foreach($recentProjects as $recentProject)
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{ Voyager::image($recentProject->image) }}" alt="Project_Image" class="img-responsive border-radius" style="width:357px;">
                </div>
                <h3><a href="blog_detail.html">{{$recentProject->title}}</a></h3>
                <!-- <p>We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>  -->
                <a href="{{url('project/'.$recentProject->id)}}" class="btn-light border-radius button-hover">Project Details</a>
              </div>
            </div>
            @endforeach
            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endif

<!--Customers Review-->
<section id="reviews" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
      <h2 class="heading heading_space">Happy Customers <span class="divider-center"></span></h2>
      <div id="review-slider" class="owl-carousel text-center">
        <div class="item">
          <span class="client_name">John Smith</span>
          <p>Ditector Shangha</p>
          <img src="{{asset('public/theme/images/customer1.png')}}" class="client_pic border-radius" alt="costomer">
          <p>I've been happy with the services provided by BuildingX LLC. Scooter Libby has been wonderful! He has returned my calls quickly, and he answered all my questions. This is required when, for example, the final text is not yet available. We are here to help you from the initial phase to the final construction phase.</p>
        </div>
        <div class="item">
          <span class="client_name">John Smith</span>
          <p>Ditector Shangha</p>
          <img src="{{asset('public/theme/images/customer1.png')}}" class="client_pic border-radius" alt="costomer">
          <p>I've been happy with the services provided by BuildingX LLC. Scooter Libby has been wonderful! He has returned my calls quickly, and he answered all my questions. This is required when, for example, the final text is not yet available. We are here to help you from the initial phase to the final construction phase.</p>
        </div>
        <div class="item">
          <span class="client_name">John Smith</span>
          <p>Ditector Shangha</p>
          <img src="{{asset('public/theme/images/customer1.png')}}" class="client_pic border-radius" alt="costomer">
          <p>I've been happy with the services provided by BuildingX LLC. Scooter Libby has been wonderful! He has returned my calls quickly, and he answered all my questions. This is required when, for example, the final text is not yet available. We are here to help you from the initial phase to the final construction phase.</p>
        </div>
       </div>
      </div>
    </div>
  </div>
</section>

<!--Paralax -->
<section id="parallax" class="parallax">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
       
       <h1>50</h1>
       <h2>Projects added last week</h2>
       <br><br>
       <a href="{{url('projects')}}" class="border-radius button-hover">Projects</a>
      </div>
    </div>
  </div>
</section>




@endsection

@section('scripts')

<script type="text/javascript">
    


</script>

@endsection