<?php

use App\Http\Controllers\Admin\ActivityCategoryController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CompanyDirectoryController;
use App\Http\Controllers\Admin\CompanyDirectoryTopicController;
use App\Http\Controllers\Admin\CompanyDocumentCategoryController;
use App\Http\Controllers\Admin\CompanyDocumentController;
use App\Http\Controllers\Admin\ContentTypeController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EventCategoryController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\MenuGroupController;
use App\Http\Controllers\Admin\MenuHasSlotController;
use App\Http\Controllers\Admin\NewsCategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\ProjectCategoryController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\SlotController;
use App\Http\Controllers\Admin\SlotHasContentController;
use App\Http\Controllers\Admin\SocialMediaLinkController;
use App\Http\Controllers\Admin\TranslationController;
use App\Http\Controllers\Company\CompanyDirectoryController as CompanyCompanyDirectoryController;
use App\Http\Controllers\Company\CompanyDocumentController as CompanyCompanyDocumentController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    return redirect()->route('dashboard');
})->name('/');

Route::get('/clear-cache', function() {
    Artisan::call('config:cache');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    return "Cache is cleared";
})->name('clear.cache');

Route::get('login', [AuthController::class, 'index'])->name('login.index');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::get('company/login', [AuthController::class, 'companyIndex'])->name('login.company');
Route::post('company/login', [AuthController::class, 'companyLogin'])->name('login.company.index');

Route::get('logout', [AuthController::class, 'logout']);


Route::middleware(['admin'])->group(function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/menu_group', MenuGroupController::class);
    Route::resource('/slot', SlotController::class);
    Route::resource('/content_type', ContentTypeController::class);
    Route::resource('/menu_slot', MenuHasSlotController::class);
    Route::resource('/slot_content', SlotHasContentController::class);
    Route::resource('/menu', MenuController::class);
    Route::resource('/news', NewsController::class);
    Route::resource('/news_category', NewsCategoryController::class);
    Route::resource('/company_directory_topic', CompanyDirectoryTopicController::class);
    Route::resource('/company_document_category', CompanyDocumentCategoryController::class);
    Route::resource('/region', RegionController::class);
    Route::resource('/country', CountryController::class);
    Route::resource('/city', CityController::class);
    Route::resource('/language', TranslationController::class);
    Route::resource('/event', EventController::class);
    Route::resource('/event_category', EventCategoryController::class);
    Route::resource('/project_category', ProjectCategoryController::class);
    Route::resource('/activity', ActivityController::class);
    Route::resource('/activity_category', ActivityCategoryController::class);
    Route::resource('/company_directory', CompanyDirectoryController::class);
    Route::resource('/project', ProjectController::class);
    Route::resource('/company_document', CompanyDocumentController::class);
    Route::resource('/manage_admin', AdminController::class)->parameter('manage_admin', 'admin');
    Route::resource('/social_media', SocialMediaLinkController::class)->parameter('social_media', 'socialMediaLink');
});

Route::middleware(['company'])->group(function() {
    Route::resource('/company/company_directory', CompanyCompanyDirectoryController::class, ['as' => 'company']);
    Route::resource('/company/company_document', CompanyCompanyDocumentController::class, ['as' => 'company']);
});

Route::get('/_dev_/console/link', function() {
    Artisan::call('storage:link');
});