<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CompanyApiController;
use App\Http\Controllers\Api\CompanyCategoryApiController;
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


    // Route::get('companycategories', [CompanyCategoryApiController::class, 'index']);
    // Route::get('companycategories/{id}', [CompanyCategoryApiController::class, 'show']);
    // Route::middleware('auth:api')->post('companycategories', [CompanyCategoryApiController::class, 'store']);
    Route::get('companycategories', [CompanyCategoryApiController::class, 'index']);
    Route::get('companycategories/{id}', [CompanyCategoryApiController::class, 'show']);
    Route::post('companycategories', [CompanyCategoryApiController::class, 'store']);
    Route::put('companycategories/{id}', [CompanyCategoryApiController::class, 'update']);
    Route::delete('companycategories/{id}', [CompanyCategoryApiController::class, 'destroy']);
