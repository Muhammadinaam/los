@extends('layouts.layout')

@section('content')




		@if(Auth::user()->company_owner == '1')


			

			

			<!--SERVICE SECTION-->
			<section id="pricing" class="padding-top padding-bottom-half">
			  <div class="container">
			    <div class="row">

			    @if( count( Auth::user()->subscription() ) == 0 )
			    <h5 class="text-center" >You have not subscribed. Please select from the following plans</h5>
			    
			    @elseif( count( Auth::user()->subscription() ) == 1 )
			    <p>Detail of you subscription is given below:</p>
					<table class="table">
						<thead>
							<tr>
								<th>Plan</th>
								<th>Users</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>{{ Auth::user()->subscription()->stripe_plan }}</td>
								<td>{{ Auth::user()->subscription()->quantity }}</td>
							</tr>
						</tbody>
					</table>
					<hr>
			    @endif

			    <br>

			      <div class="col-md-4 col-sm-12">
			        <div class="price_table border-radius text-center heading_space">
			          <div class="plan half_space"><h4>Monthly Plan</h4></div>
			          <div class="price"><p><span class="dollor">$</span>10<span class="month"> per user / monthly</span></p></div>
			          <!-- <p>Consectetur adipisicing elit, sed eiusmod that incididunt.</p> -->
			          <ul>
			            <li>Best for individuals / small companies</li>
			            <li>Can upgrade at any time</li>
			          </ul>
			          
			          	@if( count( Auth::user()->subscription() ) == 0 )
			          	<form action="{{url('billing-monthly')}}" method="POST">
						  <script
						    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
						    data-key="{{config('services.stripe.key')}}"
						    data-amount="1000"
						    data-name="Demo Site"
						    data-description="Widget"
						    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
						    data-locale="auto">
						  </script>
						</form>
						@else

							@if( Auth::user()->subscription()->stripe_plan == 'monthly' )
							<a class="btn btn-success" >Your Current Plan</a>
							@else
							<a class="btn btn-primary" href="{{url('swap-plan?plan=monthly')}}">Get this Plan</a>
							@endif

						@endif

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
			          
			          @if( count( Auth::user()->subscription() ) == 0 )
			          <form action="{{url('billing-semi-annually')}}" method="POST">
						  <script
						    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
						    data-key="{{config('services.stripe.key')}}"
						    data-amount="4000"
						    data-name="Demo Site"
						    data-description="Widget"
						    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
						    data-locale="auto">
						  </script>
						</form>
						@else

							@if( Auth::user()->subscription()->stripe_plan == 'semi-annually' )
							<a class="btn btn-success" >Your Current Plan</a>
							@else
							<a class="btn btn-primary" href="{{url('swap-plan?plan=semi-annually')}}">Get this Plan</a>
							@endif

						@endif

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
			          
			          	@if( count( Auth::user()->subscription() ) == 0 )
			          	<form action="{{url('billing-annually')}}" method="POST">
						  <script
						    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
						    data-key="{{config('services.stripe.key')}}"
						    data-amount="7000"
						    data-name="Demo Site"
						    data-description="Widget"
						    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
						    data-locale="auto">
						  </script>
						</form>
						@else

							@if( Auth::user()->subscription()->stripe_plan == 'annually' )
							<a class="btn btn-success" >Your Current Plan</a>
							@else
							<a class="btn btn-primary" href="{{url('swap-plan?plan=annually')}}">Get this Plan</a>
							@endif

						@endif

			        </div>
			      </div>

			    </div>
			  </div>
			</section>

			


		
		
		@else
		
		<h3>Billing is only applicable to users who are Company Owners</h3>
		<br>
		<a style="text-decoration: underline;" href="{{url('/')}}">Back</a> to home	
		
		@endif






<br><br><br>

@endsection