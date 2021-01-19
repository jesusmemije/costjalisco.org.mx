<?php

use Illuminate\Support\Facades\Route;

//Class Front
use App\Http\Controllers\Front\HomeController;

//Class Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CKEditorController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;

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

/*============= Front ============= */

Route::namespace('Front')->group(function () {

    //Interiors
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/know-more', [HomeController::class, 'know_more'])->name('know-more');
    Route::get('/about-us', [HomeController::class, 'about_us'])->name('about-us');
    Route::get('/multisectorial', [HomeController::class, 'multisectorial'])->name('multisectorial');
    Route::get('/resources', [HomeController::class, 'resources'])->name('resources');
    Route::get('/interest-sites', [HomeController::class, 'interest_sites'])->name('interest-sites');
    Route::get('/journal', [HomeController::class, 'journal'])->name('journal');
    Route::get('/support-material', [HomeController::class, 'support_material'])->name('support-material');
    Route::get('/resources', [HomeController::class, 'resources'])->name('resources');
    Route::get('/organizations', [HomeController::class, 'organizations'])->name('organizations');
    Route::get('/contact-us', [HomeController::class, 'contact_us'])->name('contact-us');
    Route::get('/statistics', [HomeController::class, 'statistics'])->name('statistics');
    Route::get('/account', [HomeController::class, 'account'])->name('account');
    Route::get('/sitemap', [HomeController::class, 'sitemap'])->name('sitemap');

    //Projects
    require 'front/projects.php';

    //Search
    require 'front/search.php';

    //Newsletters
    require 'front/newsletters.php';
});


/*=============  Dashboard ============== */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    //Projects
    require 'admin/projects.php';

    //Users
    require 'admin/users.php';

    //News
    require 'admin/news.php';

    //Events
    require 'admin/events.php';

    //Newsletter
    require 'admin/newsletter.php';

    //Complements
    require 'admin/complements.php';

    //Organizations
    require 'admin/organizations.php';

    //Catalogs
    require 'admin/catalogs.php';

    //Newsletter subscribers
    require 'admin/subscribers.php';

    //Support material
    require 'admin/support-material.php';
    
    //Banner
    require 'admin/banner.php';

    //Uploads images the CKEditor
    Route::post('/ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');

    //Extras
    Route::get('/admin/testmap', [AdminProjectController::class, 'testmap'])->name('testmap');
    Route::get('/admin/testmap2', [AdminProjectController::class, 'testmap2'])->name('testmap2');

    Route::post('/admin/uploadExcel', [AdminProjectController::class, 'uploadExcel'])->name('uploadExcel');

    Route::post('/admin/tm', [AdminProjectController::class, 'tm'])->name('tm');
});
