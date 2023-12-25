<?php

use App\Http\Controllers\Api\CategoryApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyApiController;
use App\Http\Controllers\Api\CompanyCategoryApiController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\JobApiController;
use App\Http\Controllers\DashboardCompanyController;
use App\Models\CompanyCategory;

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



    // Api kategori Perusahaan
    Route::get('companycategories', [CompanyCategoryApiController::class, 'index']);
    Route::get('companycategories/{id}', [CompanyCategoryApiController::class, 'show']);
    Route::post('companycategories', [CompanyCategoryApiController::class, 'store']);
    Route::put('companycategories/{id}', [CompanyCategoryApiController::class, 'update']);
    Route::delete('companycategories/{id}', [CompanyCategoryApiController::class, 'destroy']);
// Api Perusahaan
    Route::get('company', [CompanyController::class, 'index']);
    Route::get('company/{id}', [CompanyController::class, 'show']);
    Route::post('company', [CompanyController::class, 'store']);
    Route::put('company/{id}', [CompanyController::class, 'update']);
    Route::delete('company/{id}', [CompanyController::class, 'destroy']);
    // Api Kategori
    Route::get('kategori', [CategoryApiController::class, 'index']);
    Route::get('kategori/{id}', [CategoryApiController::class, 'show']);
    Route::post('kategori', [CategoryApiController::class, 'store']);
    Route::put('kategori/{id}', [CategoryApiController::class, 'update']);
    Route::delete('kategori/{id}', [CategoryApiController::class, 'destroy']);
    // Api Pekerjaan
    Route::get('pekerjaan', [JobApiController::class, 'index']);
    Route::get('pekerjaan/{id}', [JobApiController::class, 'show']);
    Route::post('pekerjaan', [JobApiController::class, 'store']);
    Route::put('pekerjaan/{id}', [JobApiController::class, 'update']);
    Route::delete('pekerjaan/{id}', [JobApiController::class, 'destroy']);
