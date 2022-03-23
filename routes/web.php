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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [
	'as' => 'home',
	'uses' => 'App\Http\Controllers\HomeController@index'
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

	Route::post('/subscription', [
		'as' => 'subscription.create',
		'uses' => 'App\Http\Controllers\SubscriptionController@create'
	]);


});


//Admin Route Group
Route::middleware(['auth', 'admin'])->group(function () {

	Route::get('/admin', [
		'as' => 'admin_dashboard',
		'uses' => 'App\Http\Controllers\AdminController@dashboard'
	]);

	Route::get('/admin/search_users', [
		'as' => 'admin_search_users',
		'uses' => 'App\Http\Controllers\AdminController@searchUsers'
	]);

	Route::get('/admin/edit_user/{user_id}', [
		'as' => 'admin_edit_user',
		'uses' => 'App\Http\Controllers\AdminController@editUser'
	]);

	Route::put('/admin/update_user/{user_id}', [
		'as' => 'admin_update_user',
		'uses' => 'App\Http\Controllers\AdminController@updateUser'
	]);

	Route::put('/admin/deactivate_user/{user_id}', [
		'as' => 'admin_deactivate_user',
		'uses' => 'App\Http\Controllers\AdminController@deactivateUser'
	]);

	Route::put('/admin/activate_user/{user_id}', [
		'as' => 'admin_activate_user',
		'uses' => 'App\Http\Controllers\AdminController@activateUser'
	]);

	Route::delete('/admin/delete_user/{user_id}', [
		'as' => 'admin_delete_user',
		'uses' => 'App\Http\Controllers\AdminController@destroyUser'
	]);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');