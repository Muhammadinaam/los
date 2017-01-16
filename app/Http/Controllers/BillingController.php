<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class BillingController extends Controller
{
    //

    public function index()
    {

    	return view('billing');
    }

    public function subscribeMonthly(Request $request)
    {
    	$creditCardToken = $request['stripeToken'];
    	Auth::user()->newSubscription('default', 'monthly')->create($creditCardToken);

    	return redirect('billing');
    }

    public function subscribeSemiAnnually(Request $request)
    {
    	$creditCardToken = $request['stripeToken'];
    	Auth::user()->newSubscription('default', 'semi-annually')->create($creditCardToken);

    	return redirect('billing');
    }

    public function subscribeAnnually(Request $request)
    {
    	$creditCardToken = $request['stripeToken'];
    	Auth::user()->newSubscription('default', 'annually')->create($creditCardToken);

    	return redirect('billing');
    }

    public function swapPlan(Request $request)
    {
    	$newPlan = $request->plan;

    	Auth::user()->subscription()->swap($newPlan);

    	return redirect('billing');
    }

}
