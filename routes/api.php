<?php

use App\Http\Controllers\Api\ActivityCategoryController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\CompanyDirectoryController;
use App\Http\Controllers\Api\ContactSupportController;
use App\Http\Controllers\Api\EngagedUserController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\MenuGroupController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\NewsletterSubscriberController;
use App\Http\Controllers\Api\SocialMediaController;
use App\Http\Controllers\Api\SocialMediaLinkController;
use App\Http\Controllers\Api\SponsorController;
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
    Route::get('/profile', 'profile');
    Route::get('/{id}', 'show');

    Route::middleware('auth:sanctum')->get('/profile', 'profile');
    Route::middleware('auth:sanctum')->post('/upload', 'upload');
    Route::middleware('auth:sanctum')->delete('/document/delete', 'deleteDocument');
});

Route::group([
    'controller' => NewsController::class,
    'prefix' => 'news'
], function() {
    Route::get('/home', 'home');
    Route::get('/carousel', 'carousel');
    Route::get('/{id}', 'show');
});

Route::group([
    'controller' => SponsorController::class,
    'prefix' => 'sponsor'
], function() {
    Route::get('/', 'index');
});

Route::group([
    'controller' => NewsletterSubscriberController::class,
    'prefix' => 'newsletter'
], function() {
    Route::post('/subscribe', 'store');
});

Route::group([
    'controller' => EngagedUserController::class,
    'prefix' => 'contact_us'
], function() {
    Route::post('/', 'store');
});

Route::group([
    'controller' => EventController::class,
    'prefix' => 'event'
], function() {
    Route::get('categories', 'categories');
    Route::get('home', 'home');
});

Route::group([
    'controller' => ContactSupportController::class,
    'prefix' => 'contact_support'
], function() {
    Route::get('/', 'index');
});

Route::group([
    'controller' => SocialMediaController::class,
    'prefix' => 'social_media'
], function() {
    Route::get('/', 'index');
});

Route::group([
    'controller' => ActivityController::class,
    'prefix' => 'activity'
], function() {
    Route::get('/', 'index');
});

Route::group([
    'controller' => ActivityCategoryController::class,
    'prefix' => 'activity_category'
], function() {
    Route::get('/', 'index');
});

Route::group([
    'controller' => SocialMediaLinkController::class,
    'prefix' => 'social_media'
], function() {
    Route::get('/', 'index');
});
