<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('logout', function(){
	
	if(Auth::check())
	{
		Auth::logout();
	}

	return redirect('/');

});

Route::get('guest/projects', 'ProjectsController@guest_index');
Route::get('guest/projects-datatable', 'ProjectsController@guest_index_datatable');
Route::get('contact-us', 'ContactusController@index');
Route::post('contact-us', 'ContactusController@mailMessage');
Route::get('inactive_account', function(){

	return view('inactive_account');
});

Route::group(['middleware' => ['active_user']], function(){

	Route::get('dashboard', 'DashboardController@index');

});

Route::group(['middleware' => ['company_owner']], function(){

	Route::get('billing', 'BillingController@index');

	Route::post('billing-monthly', 'BillingController@subscribeMonthly');
	Route::post('billing-semi-annually', 'BillingController@subscribeSemiAnnually');
	Route::post('billing-annually', 'BillingController@subscribeAnnually');

	Route::get('swap-plan', 'BillingController@swapPlan');

});

Route::get('subscription-pricing', function(){
	return view('pricing');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::group(['middleware' => ['admin.user']], function(){

    	Route::get('users', 'UsersController@index' )->name('voyager.users.index');
    	Route::get('users-datatable', 'UsersController@datatable');

    	Route::get('updates', 'UpdatesController@index' )->name('voyager.updates.index');
    	Route::get('updates-datatable', 'UpdatesController@datatable');
    	
    });

    

});

Auth::routes();

Route::get('/home', 'HomeController@index');
