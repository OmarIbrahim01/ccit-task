<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/







Route::get('/home', [
	'as' => 'home',
	'uses' => 'App\Http\Controllers\HomeController@index'
]);



Route::group(['prefix' => '/'], function()
{
    if (Auth::check())
    {
        Route::get('/', function () {
		    return redirect()->route('plans.index');
		});
    } else{
        Route::get('/', function () {
		    return redirect()->route('home');
		});
    }
});


//Auth Route Group
Route::middleware(['auth'])->group(function () {

	Route::get('/my_subscription', [
		'as' => 'my_subscription',
		'uses' => 'App\Http\Controllers\UserSubscription@show'
	]);

});


Route::middleware(['auth'])->group(function () {

    Route::get('/plans', [
		'as' => 'plans.index',
		'uses' => 'App\Http\Controllers\PlanController@index'
	]);

	Route::get('/plan/{plan}', [
		'as' => 'plans.show',
		'uses' => 'App\Http\Controllers\PlanController@show'
	]);

	Route::post('/subscription', [
		'as' => 'subscription.create',
		'uses' => 'App\Http\Controllers\SubscriptionController@create'
	]);


    //Routes for create Plan
    Route::get('create/plan', [
		'as' => 'create.plan',
		'uses' => 'App\Http\Controllers\SubscriptionController@createPlan'
	]);

    Route::post('store/plan', [
		'as' => 'store.plan',
		'uses' => 'App\Http\Controllers\SubscriptionController@storePlan'
	]);


});


//Admin Route Group
Route::middleware(['auth', 'admin'])->group(function () {

	Route::get('/admin', [
		'as' => 'admin_dashboard',
		'uses' => 'App\Http\Controllers\AdminController@dashboard'
	]);

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');