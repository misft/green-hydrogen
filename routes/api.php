<?php

use App\Http\Controllers\Api\CompanyDirectoryController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\MenuGroupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'controller' => MenuGroupController::class,
    'prefix' => 'menu_group'
], function() {
    Route::get('/', 'index');
    Route::get('{menu_group}', 'show');
});

Route::group([
    'controller' => MenuController::class,
    'prefix' => 'menu'
], function() {
    Route::get('/', 'index');
    Route::get('/{menu}', 'show');
});

Route::group([
    'controller' => CompanyDirectoryController::class,
    'prefix' => 'company_directory'
], function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');

    Route::middleware('auth:sanctum')->get('/profile', 'profile');
});
