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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/home', [
	'as' => 'home',
	'uses' => 'App\Http\Controllers\HomeController@index'
]);

Route::get('/admin', [
	'as' => 'admin_dashboard',
	'uses' => 'App\Http\Controllers\AdminController@dashboard'
]);


//Auth Route Group
Route::middleware(['auth'])->group(function () {

	Route::get('/my_subscription', [
		'as' => 'my_subscription',
		'uses' => 'App\Http\Controllers\UserSubscription@show'
	]);

});


//Admin Route Group
Route::middleware(['auth', 'admin'])->group(function () {

	

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');