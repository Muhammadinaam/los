@extends('layouts.layout')

@section('content')

<br><br>


<!--Page Header-->
<section class="page_header padding-top">
  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center page-content">
        <h1>Pricing Tables</h1>
        <p>We offer the most complete house renovating services in the country</p>
        <div class="page_nav">
         <span>You are here:</span> <a href="{{url('')}}">Home</a> 
        <span><i class="fa fa-angle-double-right"></i>Pricing Tables</span>
      </div>
      </div>
    </div>
  </div>
</section>




<!--SERVICE SECTION-->
<section id="pricing" class="padding-top padding-bottom-half">
  <div class="container">
    <div class="row">

      <div class="col-md-4 col-sm-12">
        <div class="price_table border-radius text-center heading_space">
          <div class="plan half_space"><h4>Monthly Plan</h4></div>
          <div class="price"><p><span class="dollor">$</span>10<span class="month"> per user / monthly</span></p></div>
          <!-- <p>Consectetur adipisicing elit, sed eiusmod that incididunt.</p> -->
          <ul>
            <li>Best for individuals / small companies</li>
            <li>Can upgrade at any time</li>
          </ul>
          <a href="{{url('billing')}}" class="btn-light border-radius button-hover">Subscribe</a>
        </div>
      </div>

      <div class="col-md-4 col-sm-12">
        <div class="price_table border-radius text-center heading_space">
          <div class="plan half_space"><h4>Semi Annually Plan</h4></div>
          <div class="price"><p><span class="dollor">$</span>40<span class="month"> per user / semi annually</span></p></div>
          <!-- <p>Consectetur adipisicing elit, sed eiusmod that incididunt.</p> -->
          <ul>
            <li>Best for medium sized companies</li>
            <li>Can upgrade or degrade at any time</li>
          </ul>
          <a href="{{url('billing')}}" class="btn-light border-radius button-hover">Subscribe</a>
        </div>
      </div>

      <div class="col-md-4 col-sm-12">
        <div class="price_table border-radius text-center heading_space active">
          <div class="plan half_space"><h4>Annually Plan</h4></div>
          <div class="price"><p><span class="dollor">$</span>70<span class="month"> per user / annually</span></p></div>
          <!-- <p>Consectetur adipisicing elit, sed eiusmod that incididunt.</p> -->
          <ul>
            <li>Best for Large Teams / Companies</li>
            <li>Can degrade at any time</li>
          </ul>
          <a href="{{url('billing')}}" class="btn-light border-radius button-hover">Subscribe</a>
        </div>
      </div>

    </div>
  </div>
</section>

<br><br><br>

@endsection