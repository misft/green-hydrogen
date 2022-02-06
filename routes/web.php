<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\ContentTypeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuGroupController;
use App\Http\Controllers\Admin\MenuHasSlotController;
use App\Http\Controllers\Admin\SlotController;
use App\Http\Controllers\Admin\SlotHasContentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function(){
    return redirect()->route('default');
})->name('/');

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

Route::get('login', [AuthController::class, 'index']);
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::prefix('menu')->name('menu.')->group(function() {
    Route::resource('/', MenuController::class);
    Route::resource('/group', MenuGroupController::class);
    Route::resource('/slot', SlotController::class);
    Route::resource('/content_type', ContentTypeController::class);
    Route::resource('/menu_slot', MenuHasSlotController::class);
    Route::resource('/slot_content', SlotHasContentController::class);
});