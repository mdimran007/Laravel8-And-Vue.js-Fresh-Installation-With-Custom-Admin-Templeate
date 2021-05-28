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
    return view('frontend.master');
});




Route::get('/about', function () {
	return view('frontend.master');
});

Route::get('/services', function () {
	return view('frontend.master');
});

Route::get('/services-details/{id}', function () {
	return view('frontend.master');
});

Route::get('/portfolio', function () {
	return view('frontend.master');
});

Route::get('/portfolio-details/{id}', function () {
	return view('frontend.master');
});

Route::get('/contact', function () {
	return view('frontend.master');
});

//Route::get('/{anypath}', 'App\Http\Controllers\FrontEnd\HomeController@index')->where('path', '.*');
//Route::get('/{anypath}/{id}', 'App\Http\Controllers\FrontEnd\HomeController@index')->where('path', '.*');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', 'App\Http\Controllers\BackEnd\HomeController@index')->name('dashboard');

// Route::middleware(['auth:sanctum', 'verified'])->group(function () {

// Route::get('/dashboard', 'App\Http\Controllers\BackEnd\HomeController@index')->name('dashboard');

// Route::get('/{anypath}', 'App\Http\Controllers\BackEnd\HomeController@index')->where('path', '.*');
// Route::get('/{anypath}/{id}', 'App\Http\Controllers\BackEnd\HomeController@index')->where('path', '.*');

// });



Route::get('/home-page', function () {
	return view('backend.master');
});

Route::get('/personal-info', function () {
	return view('backend.master');
});

Route::get('/get-count', function () {
	return view('backend.master');
});

Route::get('/services-page', function () {
	return view('backend.master');
});
Route::get('/view-service/{id}', function () {
	return view('backend.master');
});
Route::get('/edit-service/{id}', function () {
	return view('backend.master');
});

Route::get('/portfolio-category', function () {
	return view('backend.master');
});

Route::get('/portfolio-list', function () {
	return view('backend.master');
});

Route::get('/portfolio-update/{id}', function () {
	return view('backend.master');
});

Route::get('/portfolio-view/{id}', function () {
	return view('backend.master');
});

Route::get('/contact-inbox', function () {
	return view('backend.master');
});
Route::get('/logo-setting', function () {
	return view('backend.master');
});
Route::get('/menu-setting', function () {
	return view('backend.master');
});



