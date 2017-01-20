<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<title>BuildingX</title>
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/building-icons.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/animate.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/owl.transitions.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/jquery.fancybox.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/settings.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/zerogrid.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/bootsnav.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/style.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/theme/css/loader.css')}}">

@yield('styles')

<link rel="icon" href="{{asset('public/theme/images/favicon.png')}}">

<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<a href="#" class="scrollToTop"><i class="fa fa-angle-up"></i></a>
<!--Loader-->
<div class="loader">
  <div class="satellite"></div>
  <p class="title-loader">Loading ...</p>
</div>

<div class="topbar blue_dark">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6">
        <p>Contractors & Construction Managers Since 1991.</p>
      </div>
      <div class="col-md-6 col-sm-6">
        <ul class="social_top">
          <li><a href="#."><i class="fa fa-facebook"></i></a></li>
          <li><a href="#."><i class="icon-twitter4"></i></a></li>
          <li><a href="#."><i class="icon-google"></i></a></li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!--Header-->
<header>

  @if(!Auth::check())
  <!-- Show to Guests only -->
  <div class="container">
    <div class="row">
      <div class="col-md-12 clearfix">
        <a class="navbar-brand" href="index.html"><img src="{{asset('public/theme/images/logo.png')}}" alt="logo" class="img-responsive"></a>
        <ul class="company_info">
          <li><i class="icon-phone8"></i><strong>1-333-444-4567</strong>info@construction.com</li>
          <li><i class="icon-location"></i><strong>Golden Age Street,</strong>England London, U.K., E14LS</li>
          <li><i class="icon-clock5"></i><strong>Mon - Sat 8.00 - 18.00</strong>Sunday Closed</li>
        </ul>
      </div>
    </div>
  </div>
  @endif
  <nav class="navbar navbar-default navbar-sticky bootsnav">
    <div class="container"> 
      <div class="attr-nav">
        <ul>
          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#"><i class="icon-twitter4"></i></a></li>
          <li><a href="#"><i class="icon-google"></i></a></li>
        </ul>
      </div> 
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
          <i class="fa fa-bars"></i>
        </button>
        <a class="navbar-brand" href="index.html"><img src="{{asset('public/theme/images/logo_black.png')}}" alt="logo" class="img-responsive"></a>
      </div>
      <div class="collapse navbar-collapse" id="navbar-menu">
        <ul class="nav navbar-nav navbar-center" data-in="fadeInDown" data-out="fadeOut">
          <li class="active"><a href="{{url('')}}">Home</a></li>
          
          @if(Auth::check())

          <li><a href="{{url('dashboard')}}">Dashboard</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Projects</a>
            <ul class="dropdown-menu">
              <li><a href="{{url('search-projects')}}">Search Projects</a></li>
              <li><a href="{{url('project-updates')}}">Project Updates</a></li>
            </ul>
          </li>
          @else
          <li><a href="{{url('guest/projects')}}">Projects</a></li>
          @endif

          <li><a href="{{url('news')}}">News</a></li>
          <li><a href="{{url('contact-us')}}">Contact Us</a></li>
          @if(!Auth::check())
          <li><a href="{{url('login')}}">Login</a></li>
          @else

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" >Account</a>
            <ul class="dropdown-menu">
              
              @if(Auth::user()->company_owner = '1')
              <li><a href="{{url('users')}}">Users</a></li>
              <li><a href="{{url('billing')}}">Billing</a></li>
              @endif

              <li><a href="{{url('logout')}}">Logout</a></li>
            </ul>
          </li>

          @endif
        </ul>
      </div>
    </div>   
  </nav>
</header>



@yield('content')



<footer class="padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-4 footer_panel half_space">
        <h3 class="heading half_space">About Us<span class="divider-left"></span></h3>
        <a href="index.html" class="footer_logo half_space"><img src="{{asset('public/theme/images/logo-footer.png')}}" alt="Building X"></a>
        <p>We offer the most complete house renovating services in the country, from kitchen design to bathroom remodeling.</p>
        <ul class="social_icon heading_top">
          <li><a href="#." class="facebook"><i class="fa fa-facebook"></i></a></li>
          <li><a href="#." class="twitter"><i class="icon-twitter4"></i></a></li>
          <li><a href="#." class="dribble"><i class="icon-dribbble5"></i></a></li>
          <li><a href="#." class="instagram"><i class="icon-instagram"></i></a></li>
          <li><a href="#." class="vimo"><i class="icon-vimeo4"></i></a></li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-4 footer_panel half_space">
        <h3 class="heading half_space">Quick Links<span class="divider-left"></span></h3>
        <ul class="links">
          <li><a href="#."><i class="icon-chevron-small-right"></i>Home</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Company</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Services</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Our Team</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Company History</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Certifications</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Blog</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Shop</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Privacy Policy</a></li>
          <li><a href="#."><i class="icon-chevron-small-right"></i>Contact Us</a></li>
        </ul>
      </div>
      <div class="col-md-4 col-sm-4 footer_panel half_space">
        <h3 class="heading half_space">Keep in Touch <span class="divider-left"></span></h3>
        <p class=" address"><i class="icon-map-pin"></i>198 West 21th Street Victoria 8007, Australia</p>
        <p class=" address"><i class="icon-phone"></i>(654) 332-112-222</p>
        <p class=" address"><i class="icon-mail"></i><a href="mailto:buildingx@info.com">buildingx@info.com</a></p>
        <img src="{{asset('public/theme/images/footer-map.png')}}" alt="we are here" class="img-responsive">
      </div>
    </div>
  </div>
</footer>
<div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <p>Copyright &copy; 2016 <a href="#.">BuildingX</a>. all rights reserved.</p>
      </div>
    </div>
  </div>
</div>





<script src="{{asset('public/theme/js/jquery-2.2.3.js')}}"></script>
<script src="{{asset('public/theme/js/bootstrap.min.js')}}"></script>
<script src="{{asset('public/theme/js/bootsnav.js')}}"></script>
<script src="{{asset('public/theme/js/jquery.appear.js')}}"></script>
<script src="{{asset('public/theme/js/jquery-countTo.js')}}"></script>
<script src="{{asset('public/theme/js/jquery.parallax-1.1.3.js')}}"></script>
<script src="{{asset('public/theme/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/theme/js/jquery.mixitup.min.js')}}"></script>
<script src="{{asset('public/theme/js/jquery.fancybox.js')}}"></script>
<script src="{{asset('public/theme/js/jquery.cubeportfolio.min.js')}}"></script>
<script src="{{asset('public/theme/js/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('public/theme/js/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('public/theme/js/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('public/theme/js/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('public/theme/js/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('public/theme/js/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('public/theme/js/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('public/theme/js/functions.js')}}"></script>


@yield('scripts')


</body>
</html>
