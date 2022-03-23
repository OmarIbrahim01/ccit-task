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

Route::get('/', [
	'as' => 'home',
	'uses' => 'App\Http\Controllers\HomeController@index'
]);


//Login With Github Routes
Route::get('/sign-in/github', 'App\Http\Controllers\Auth\LoginController@github');
Route::get('/sign-in/github/redirect', 'App\Http\Controllers\Auth\LoginController@githubRedirect');

// Suspended account error page
Route::get('/suspended_account', [
	'as' => 'suspended_account',
	'uses' => 'App\Http\Controllers\HomeController@suspendedAccount'
]);

Route::middleware(['auth'])->group(function () {

    Route::get('/plans', [
		'as' => 'plans.index',
		'uses' => 'App\Http\Controllers\PlanController@index'
	]);

	Route::get('/plan/{plan}', [
		'as' => 'plans.show',
		'uses' => 'App\Http\Controllers\PlanController@show'
	]);

	Route::get('/my_subscription', [
		'as' => 'subscription.show',
		'uses' => 'App\Http\Controllers\UserPlanSubscriptionController@show'
	]);

	Route::post('/subscription', [
		'as' => 'subscription.store',
		'uses' => 'App\Http\Controllers\UserPlanSubscriptionController@store'
	]);

});


//Admin Route Group
Route::middleware(['auth', 'admin'])->group(function () {

	//Admin Dashboard Route
	Route::get('/admin', [
		'as' => 'admin_dashboard',
		'uses' => 'App\Http\Controllers\AdminController@dashboard'
	]);

	//Admin Search Users Route
	Route::get('/admin/search_users', [
		'as' => 'admin_search_users',
		'uses' => 'App\Http\Controllers\AdminController@searchUsers'
	]);

	//Admin Edit User Route
	Route::get('/admin/edit_user/{user_id}', [
		'as' => 'admin_edit_user',
		'uses' => 'App\Http\Controllers\AdminController@editUser'
	]);

	//Admin Update User Route
	Route::put('/admin/update_user/{user_id}', [
		'as' => 'admin_update_user',
		'uses' => 'App\Http\Controllers\AdminController@updateUser'
	]);

	//Admin Deactivate User Route
	Route::put('/admin/deactivate_user/{user_id}', [
		'as' => 'admin_deactivate_user',
		'uses' => 'App\Http\Controllers\AdminController@deactivateUser'
	]);

	//Admin Activate User Route
	Route::put('/admin/activate_user/{user_id}', [
		'as' => 'admin_activate_user',
		'uses' => 'App\Http\Controllers\AdminController@activateUser'
	]);

	//Admin Destroy User Route
	Route::delete('/admin/delete_user/{user_id}', [
		'as' => 'admin_delete_user',
		'uses' => 'App\Http\Controllers\AdminController@destroyUser'
	]);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');