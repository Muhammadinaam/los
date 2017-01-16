@extends('layouts.layout')


@section('content')

<!--Slider-->
<section class="rev_slider_wrapper text-center">            
<!-- START REVOLUTION SLIDER 5.0 auto mode -->
  <div id="rev_slider" class="rev_slider"  data-version="5.0">
    <ul>    
    <!-- SLIDE  -->
      <li data-transition="fade">
        <!-- MAIN IMAGE -->
        <img src="{{asset('public/theme/images/banner.jpg')}}" alt="" data-bgposition="center center" data-bgfit="cover">                         
        <!-- LAYER NR. 1 -->
        <h1 class="tp-caption  tp-resizeme"                             
        data-x="center"
        data-y="230"                            
        data-width="full"
        data-transform_idle="o:1;"
        data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
        data-mask_out="x:0;y:0;s:inherit;e:inherit;"                             
        data-start="800">Construction Management
        </h1>
        <div class="tp-caption  tp-resizeme"                            
        data-x="center"
        data-y="290"                            
        data-width="full"
        data-transform_idle="o:1;"
        data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
        data-mask_out="x:0;y:0;s:inherit;e:inherit;"                             
        data-start="800"><p>We offer the most complete house renovating services in the country, from kitchen<br>design to bathroom remodeling.</p>
        </div>
        
        <div class="tp-caption  tp-resizeme"                            
        data-x="center"
        data-y="352"                            
        data-width="full"
        data-transform_idle="o:1;"
        data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
        data-mask_out="x:0;y:0;s:inherit;e:inherit;"                             
        data-start="800">
        <a href="#." class="btn-light border-radius button-black">our services</a>
        <a href="#." class="border-radius btn-dark button-black">Get a quote</a>
        </div>
      </li>

      <li data-transition="fade">
        <img src="{{asset('public/theme/images/banner2.jpg')}}"  alt="" data-bgposition="center center" data-bgfit="cover">                           
        <h1 class="tp-caption  tp-resizeme"                             
        data-x="center"
        data-y="230"                            
        data-width="full"
        data-transform_idle="o:1;"
        data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
        data-mask_out="x:0;y:0;s:inherit;e:inherit;"                             
        data-start="800">Construction Management
        </h1>
        <div class="tp-caption  tp-resizeme"                            
        data-x="center"
        data-y="286"                            
        data-width="full"
        data-transform_idle="o:1;"
        data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
        data-mask_out="x:0;y:0;s:inherit;e:inherit;"                             
        data-start="800"><p>We offer the most complete house renovating services in the country, from kitchen<br>design to bathroom remodeling.</p>
        </div>
        <div class="tp-caption  tp-resizeme"                            
        data-x="center"
        data-y="352"                            
        data-width="full"
        data-transform_idle="o:1;"
        data-transform_in="y:[-200%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1500;e:Power3.easeInOut;" 
        data-transform_out="auto:auto;s:1000;e:Power3.easeInOut;" 
        data-mask_in="x:0px;y:0px;s:inherit;e:inherit;" 
        data-mask_out="x:0;y:0;s:inherit;e:inherit;"                             
        data-start="800">
        <a href="#." class="btn-light border-radius button-black">our services</a>
        <a href="#." class="border-radius btn-dark button-black">Get a quote</a>
        </div>
      </li>
    </ul>               
  </div><!-- END REVOLUTION SLIDER -->
</section>  


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

<!--Feature Work-->
<section id="features" class="padding parallax">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="heading heading_space">Featured Works<span class="divider-center"></span></h2>
                <div class="work-filter half_space">
                    <ul class="text-center">
                        <li><a href="javascript:;" data-filter="all" class="active filter">Filter - All</a></li>
                        <li><a href="javascript:;" data-filter=".technolog" class="filter">Plumbing</a></li>
                        <li><a href="javascript:;" data-filter=".facilities" class="filter">Green Building</a></li>
                        <li><a href="javascript:;" data-filter=".kids" class="filter">Interior Design</a></li>
                        <li><a href="javascript:;" data-filter=".dental" class="filter">Tiling</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="zerogrid gallery">
                <div class="wrap-container">
                    <div class="wrap-content clearfix">
                        <div class="col-1-4 mix work-item facilities">
                            <div class="item-container">
                                <div class="image">
                                    <img src="{{asset('public/theme/images/work1.jpg')}}" class="border-radius" alt="work" />
                                    <div class="overlay border-radius">
                                        <div class="overlay-inner">
                                            <a class="fancybox border-radius" href="images/work1.jpg" data-fancybox-group="work"><i class="icon-plus3"></i></a>
                                            <h4>Langham Hotel</h4>
                                            <p>Renean sit amet massa </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-4 mix work-item technolog">
                            <div class="item-container">
                                <div class="image">
                                    <img src="{{asset('public/theme/images/work2.jpg')}}" class="border-radius" alt="work" />
                                    <div class="overlay border-radius">
                                        <div class="overlay-inner">
                                            <a class="fancybox border-radius" href="images/work1.jpg" data-fancybox-group="work"><i class="icon-plus3"></i></a>
                                            <h4>Langham Hotel</h4>
                                            <p>Renean sit amet massa </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-4 mix work-item kids">
                            <div class="item-container">
                                <div class="image">
                                    <img src="{{asset('public/theme/images/work3.jpg')}}" class="border-radius" alt="work" />
                                    <div class="overlay border-radius">
                                        <div class="overlay-inner">
                                            <a class="fancybox border-radius" href="images/work1.jpg" data-fancybox-group="work"><i class="icon-plus3"></i></a>
                                            <h4>Langham Hotel</h4>
                                            <p>Renean sit amet massa </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-4 mix work-item facilities">
                            <div class="item-container">
                                <div class="image">
                                    <img src="{{asset('public/theme/images/work4.jpg')}}" class="border-radius" alt="work" />
                                    <div class="overlay border-radius">
                                        <div class="overlay-inner">
                                            <a class="fancybox border-radius" href="images/work1.jpg" data-fancybox-group="work"><i class="icon-plus3"></i></a>
                                            <h4>Langham Hotel</h4>
                                            <p>Renean sit amet massa </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-4 mix work-item kids">
                            <div class="item-container">
                                <div class="image">
                                    <img src="{{asset('public/theme/images/work5.jpg')}}" class="border-radius" alt="work" />
                                    <div class="overlay border-radius">
                                        <div class="overlay-inner">
                                            <a class="fancybox border-radius" href="images/work1.jpg" data-fancybox-group="work"><i class="icon-plus3"></i></a>
                                            <h4>Langham Hotel</h4>
                                            <p>Renean sit amet massa </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-4 mix work-item dental">
                            <div class="item-container">
                                <div class="image">
                                    <img src="{{asset('public/theme/images/work6.jpg')}}" class="border-radius" alt="work" />
                                    <div class="overlay border-radius">
                                        <div class="overlay-inner">
                                            <a class="fancybox border-radius" href="images/work1.jpg" data-fancybox-group="work"><i class="icon-plus3"></i></a>
                                            <h4>Langham Hotel</h4>
                                            <p>Renean sit amet massa </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-4 mix work-item technolog">
                            <div class="item-container">
                                <div class="image">
                                    <img src="{{asset('public/theme/images/work7.jpg')}}" class="border-radius" alt="work" />
                                    <div class="overlay border-radius">
                                        <div class="overlay-inner">
                                            <a class="fancybox border-radius" href="images/work1.jpg" data-fancybox-group="work"><i class="icon-plus3"></i></a>
                                            <h4>Langham Hotel</h4>
                                            <p>Renean sit amet massa </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-1-4 mix work-item technolog">
                            <div class="item-container">
                                <div class="image">
                                    <img src="{{asset('public/theme/images/work8.jpg')}}" class="border-radius" alt="work" />
                                    <div class="overlay border-radius">
                                        <div class="overlay-inner">
                                            <a class="fancybox border-radius" href="images/work1.jpg" data-fancybox-group="work"><i class="icon-plus3"></i></a>
                                            <h4>Langham Hotel</h4>
                                            <p>Renean sit amet massa </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



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
        <p>Project Completed</p>
        </div>
        <div class="counters-item last">
        <i class="icon-trophy"></i>
        <strong data-to="78">0</strong>
        <p>Awards Won</p>
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
        <p>Hours of Work / Month</p>
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



<!--What WE Do-->
<section id="wedo" class="padding bg_grey">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <h2 class="heading heading_space">What We Do <span class="divider-left"></span></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="slider_wrapper">
          <div id="do-slider" class="owl-carousel">
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/do1.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <h3><a href="blog_detail.html">General Contracting</a></h3>
                <p>We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p> 
                <a href="blog_detail.html" class="btn-light border-radius button-hover">service detail</a>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/do2.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <h3><a href="blog_detail.html">General Contracting</a></h3>
                <p>We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p> 
                <a href="blog_detail.html" class="btn-light border-radius button-hover">service detail</a>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/do3.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <h3><a href="blog_detail.html">General Contracting</a></h3>
                <p>We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p> 
                <a href="blog_detail.html" class="btn-light border-radius button-hover">service detail</a>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/do1.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <h3><a href="blog_detail.html">General Contracting</a></h3>
                <p>We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p> 
                <a href="blog_detail.html" class="btn-light border-radius button-hover">service detail</a>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/do2.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <h3><a href="blog_detail.html">General Contracting</a></h3>
                <p>We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p> 
                <a href="blog_detail.html" class="btn-light border-radius button-hover">service detail</a>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/do3.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <h3><a href="blog_detail.html">General Contracting</a></h3>
                <p>We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p> 
                <a href="blog_detail.html" class="btn-light border-radius button-hover">service detail</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

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
       <h2>Contractors & Construction Managers Since</h2>
       <h1>2003</h1>
       <a href="#." class="border-radius button-hover">Gaet a Quote</a>
      </div>
    </div>
  </div>
</section>

<!-- News-->
<section id="news" class="padding">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <h2 class="heading heading_space">Company News <span class="divider-left"></span></h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="slider_wrapper">
          <div id="news-slider" class="owl-carousel">
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/news1.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <div class="news_box border-radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/news2.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <div class="news_box border-radius">
                  <h4><a href="blog_detail.html"> Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/news3.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <div class="news_box border-radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/news1.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <div class="news_box border-radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/news2.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <div class="news_box border-radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="content_wrap">
                <div class="image">
                  <img src="{{asset('public/theme/images/news3.jpg')}}" alt="Construction" class="img-responsive border-radius">
                </div>
                <div class="news_box border-radius">
                  <h4><a href="blog_detail.html">4 Springtime Color Schemes to Try at Home</a></h4>
                  <ul class="commment">
                    <li><a href="#."><i class="icon-icons20"></i>June 6, 2016</a></li>
                    <li><a href="#."><i class="icon-comment"></i> 02</a></li>
                  </ul>
                  <p>We offer the most complete house Services in the country...</p>
                  <a href="blog_detail.html" class="readmore">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection