<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Portfolio;
use App\Models\PortfolioCategory;
use App\Models\Services;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResources(['/home-api' => 'App\Http\Controllers\Custom\Api\HomePageController']);

Route::apiResources(['/logo-api' => 'App\Http\Controllers\Custom\Api\LogoController']);
Route::apiResources(['/menu-api' => 'App\Http\Controllers\MenuController']);

Route::apiResources(['/about-personalinfo-api' => 'App\Http\Controllers\Custom\Api\PersonalInfoController']);
Route::apiResources(['/about-getcount-api' => 'App\Http\Controllers\Custom\Api\GetCountController']);
Route::apiResources(['/about-resume-api' => 'App\Http\Controllers\Custom\Api\ResumeController']);

Route::apiResources(['/services-api' => 'App\Http\Controllers\Custom\Api\ServicesController']);

Route::get('/services-api-new', function () {
    return Services::all();
});

Route::apiResources(['/portfolio-category-api' => 'App\Http\Controllers\Custom\Api\PortfolioCategoryController']);

Route::get('/portfolio-category-api-new', function () {
    return PortfolioCategory::all();
});

Route::apiResources(['/portfolio-api' => 'App\Http\Controllers\Custom\Api\PortfolioController']);

Route::get('/portfolio-api-new', function () {
    return Portfolio::all();
});

Route::apiResources(['/contact-msg-api' => 'App\Http\Controllers\Custom\Api\ContactMsgController']);