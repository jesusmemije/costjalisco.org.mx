<?php

use Illuminate\Support\Facades\Route;

//Class Front
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\NewsletterController;
use App\Http\Controllers\Front\SearchController;
use App\Http\Controllers\Front\ProjectController as FrontProjectController;

//Class Admin
use App\Http\Controllers\Admin\Catalogs\AdjudicationController;
use App\Http\Controllers\Admin\Catalogs\ContractingController;
use App\Http\Controllers\Admin\Catalogs\ContractingStatusController;
use App\Http\Controllers\Admin\Catalogs\ContractTypeController;
use App\Http\Controllers\Admin\Catalogs\DocumentTypeController;
use App\Http\Controllers\Admin\Catalogs\ProjectTypeController;
use App\Http\Controllers\Admin\Catalogs\ResourceController;
use App\Http\Controllers\Admin\CatalogsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrganizationsController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\NewsletterController as AdminNewsletterController;


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

    //Home

   

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

   //savemailsubscriber
   Route::post('/savemailsubscriber-user', [NewsletterController::class, 'savemailsubscriberf'])->name('savemailsubscriberf');
    

    //Newsletter
    Route::get('/eventos', [NewsletterController::class, 'eventos'])->name('eventos');
    Route::get('/mostrar_dias', [NewsletterController::class, 'mostrar_dias'])->name('mostrar_dias');
    Route::post('/mostrar_contenido', [NewsletterController::class, 'mostrar_contenido'])->name('mostrar_contenido');
    
    Route::get('/newsletters', [NewsletterController::class, 'newsletters'])->name('newsletters');
    Route::get('/newsletter-single/{id}', [NewsletterController::class, 'newsletter_single'])->name('newsletter-single');
    Route::post('/subscribe', [NewsletterController::class, 'subscribe'])->name('newsletter.subscribe');

    //Project
    Route::get('/list-projects', [FrontProjectController::class, 'list_projects'])->name('list-projects');
    Route::get('/card-projects', [FrontProjectController::class, 'card_projects'])->name('card-projects');
    Route::get('/project-single/{id}', [FrontProjectController::class, 'project_single'])->name('project-single');

    //Search
    Route::get('/search-engine', [SearchController::class, 'search_engine'])->name('search-engine');
    Route::get('/georeferencing', [SearchController::class, 'georeferencing'])->name('georeferencing');

    //Subscriptor email

   

    /* Fines de programación */
    Route::get('export/{id}',  [FrontProjectController::class, 'export'])->name('projectexport');
    
    Route::post('getdocumentsproject', [FrontProjectController::class, 'getdocumentsproject'])->name('getdocumentsproject');

    Route::get('/sectores', [SearchController::class, 'sectores'])->name('home.sectores');
    Route::get('/subsectores', [SearchController::class, 'subsectores'])->name('home.subsectores');
    Route::get('/codigo_postales', [SearchController::class, 'codigo_postales'])->name('home.codigo_postales');
});


/*=============  Dashboard ============== */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    
    //Subscribers

     
     Route::get('/admin/mailsubscriber', [AdminNewsletterController::class, 'mailsubscriber'])->name('mailsubscriber');
     Route::post('/admin/savemailsubscriber', [AdminNewsletterController::class, 'savemailsubscriber'])->name('savemailsubscriber');
    
     Route::post('/admin/destroymailsubscriber', [AdminNewsletterController::class, 'destroymailsubscriber'])->name('destroymailsubscriber');
    
     


    //Material de apoyo

    Route::get('/admin/support-material', [DashboardController::class, 'support_material'])->name('support-material-admin');
    Route::post('/admin/materialstore', [DashboardController::class, 'materialstore'])->name('materialstore');
    Route::post('/admin/materialedit', [DashboardController::class, 'materialedit'])->name('materialedit');
    Route::post('/admin/materialdestroy', [DashboardController::class, 'materialdestroy'])->name('materialdestroy');
    
    
    
    //Banner

    Route::get('/admin/admincarousel', [DashboardController::class, 'admincarousel'])->name('admincarousel');
    Route::post('/admin/savecarousel', [DashboardController::class, 'savecarousel'])->name('savecarousel');
    Route::post('/admin/deletecarousel', [DashboardController::class, 'deletecarousel'])->name('deletecarousel');


    Route::get('/admin/testmap', [AdminProjectController::class, 'testmap'])->name('testmap');
    Route::get('/admin/testmap2', [AdminProjectController::class, 'testmap2'])->name('testmap2');
   
    Route::post('/admin/uploadExcel', [AdminProjectController::class, 'uploadExcel'])->name('uploadExcel');
   

    Route::post('/admin/tm', [AdminProjectController::class, 'tm'])->name('tm');

    //Dashboard
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard');

    //Projects
    Route::get('/admin/projects/', [AdminProjectController::class, 'index'])->name('project.index');
    Route::get('/admin/projects/create', [AdminProjectController::class, 'create'])->name('project.create');
    Route::post('/admin/projects/', [AdminProjectController::class, 'store'])->name('project.store');
    Route::get('/admin/projects/test', [AdminProjectController::class, 'test'])->name('project.test');

    //Routes studies
    Route::get('/admin/catalogs/studies', [CatalogsController::class, 'studies'])->name('catalogs.studies');
    Route::post('/admin/catalogs/saveestudioFactibilidad', [CatalogsController::class, 'saveestudioFactibilidad'])->name('catalogs.saveestudioFactibilidad');
    Route::post('/admin/catalogs/deleteestudioFactibilidad', [CatalogsController::class, 'deleteestudioFactibilidad'])->name('catalogs.deleteestudioFactibilidad');
    Route::post('/admin/catalogs/editestudioFactibilidad', [CatalogsController::class, 'editestudioFactibilidad'])->name('catalogs.editestudioFactibilidad');
    Route::post('/admin/catalogs/saveestudioImpacto', [CatalogsController::class, 'saveestudioImpacto'])->name('catalogs.saveestudioImpacto');
    Route::post('/admin/catalogs/deleteestudioImpacto', [CatalogsController::class, 'deleteestudioImpacto'])->name('catalogs.deleteestudioImpacto');
    Route::post('/admin/catalogs/editestudioImpacto', [CatalogsController::class, 'editestudioImpacto'])->name('catalogs.editestudioImpacto');

    Route::post('/admin/catalogs/saveestudioAmbiental', [CatalogsController::class, 'saveestudioAmbiental'])->name('catalogs.saveestudioAmbiental');
    Route::post('/admin/catalogs/deleteestudioAmbiental', [CatalogsController::class, 'deleteestudioAmbiental'])->name('catalogs.deleteestudioAmbiental');
    Route::post('/admin/catalogs/editestudioAmbiental', [CatalogsController::class, 'editestudioAmbiental'])->name('catalogs.editestudioAmbiental');

    //Routes projec type
    Route::resource('/admin/catalogs/projecttype', ProjectTypeController::class);
    //Routes origin resource
    Route::resource('/admin/catalogs/resource', ResourceController::class);
    //Routes adjudication
    Route::resource('/admin/catalogs/adjudication', AdjudicationController::class);
    //Routes contract type    
    Route::resource('/admin/catalogs/contracttype', ContractTypeController::class);
    //Routes mod contract
    Route::resource('/admin/catalogs/contracting', ContractingController::class);
    //Routes contract status 
    Route::resource('/admin/catalogs/contractstatus', ContractingStatusController::class);
    //Routes document type
    Route::resource('/admin/catalogs/documenttype', DocumentTypeController::class);

    //Sectores/Subsectores
    Route::get('/admin/catalogs/sectors', [CatalogsController::class, 'cat_sectors'])->name('catalogs.cat_sectors');
    Route::post('/admin/catalogs/getdatafromnamesector', [CatalogsController::class, 'getdatafromnamesector'])->name('catalogs.getdatafromnamesector');
    Route::post('/admin/catalogs/savesector', [CatalogsController::class, 'savesector'])->name('catalogs.savesector');
    Route::post('/admin/catalogs/deletesector', [CatalogsController::class, 'deletesector'])->name('catalogs.deletesector');
    Route::post('/admin/catalogs/deletesubsector', [CatalogsController::class, 'deletesubsector'])->name('catalogs.deletesubsector');
    Route::post('/admin/catalogs/editsector', [CatalogsController::class, 'editsector'])->name('catalogs.editsector');
    Route::post('/admin/catalogs/editsubsector', [CatalogsController::class, 'editsubsector'])->name('catalogs.editsubsector');
    Route::post('/admin/catalogs/savesubsector', [CatalogsController::class, 'savesubsector'])->name('catalogs.savesubsector');
    Route::post('/admin/catalogs/subsectores', [CatalogsController::class, 'subsectores'])->name('catalogs.subsec');

    //nav views project phases

    Route::get('/admin/projects/generaldata/{project?}', [AdminProjectController::class, 'generaldata'])->name('project.generaldata2');
    Route::get('/admin/projects/generaldata/', [AdminProjectController::class, 'generaldata'])->name('project.generaldata');



    Route::get('/admin/projects/identificacion/{project?}', [AdminProjectController::class, 'identificacion'])->name('project.identificacion');
    Route::get('/admin/projects/preparacion/{project?}', [AdminProjectController::class, 'preparacion'])->name('project.preparacion');
    Route::get('/admin/projects/contratacion/{project?}', [AdminProjectController::class, 'contratacion'])->name('project.contratacion');
    Route::get('/admin/projects/ejecucion/{project?}', [AdminProjectController::class, 'ejecucion'])->name('project.ejecucion');
    Route::get('/admin/projects/finalizacion/{project?}', [AdminProjectController::class, 'finalizacion'])->name('project.finalizacion');

    //edit phases project
    Route::get('/admin/projects/identificacion/{project}/', [AdminProjectController::class, 'editidentificacion'])->name('project.editidentificacion');

    //save phases project
    Route::post('/admin/projects/savegeneraldata/', [AdminProjectController::class, 'savegeneraldata'])->name('project.savegeneraldata');
    Route::post('/admin/projects/saveidentificacion', [AdminProjectController::class, 'saveidentificacion'])->name('project.saveidentificacion');
    Route::post('/admin/projects/savepreparacion', [AdminProjectController::class, 'savepreparacion'])->name('project.savepreparacion');
    Route::post('/admin/projects/savecontratacion', [AdminProjectController::class, 'savecontratacion'])->name('project.savecontratacion');
    Route::post('/admin/projects/saveejecucion', [AdminProjectController::class, 'saveejecucion'])->name('project.saveejecucion');
    Route::post('/admin/projects/savefinalizacion', [AdminProjectController::class, 'savefinalizacion'])->name('project.savefinalizacion');

    //update phases project
    Route::post('/admin/projects/updategeneraldata/', [AdminProjectController::class, 'updategeneraldata'])->name('project.updategeneraldata');
    Route::post('/admin/projects/updateidentificacion/', [AdminProjectController::class, 'updateidentificacion'])->name('project.updateidentificacion');
    Route::post('/admin/projects/updatepreparacion/', [AdminProjectController::class, 'updatepreparacion'])->name('project.updatepreparacion');
    Route::post('/admin/projects/updatecontratacion/', [AdminProjectController::class, 'updatecontratacion'])->name('project.updatecontratacion');
    Route::post('/admin/projects/updateejecucion/', [AdminProjectController::class, 'updateejecucion'])->name('project.updateejecucion');
    Route::post('/admin/projects/updatefinalizacion/', [AdminProjectController::class, 'updatefinalizacion'])->name('project.updatefinalizacion');
    Route::delete('/admin/projects/{id}', [AdminProjectController::class, 'destroy'])->name('project.destroy');


    //delete project documents
    Route::post('/admin/projects/deletedocument/', [AdminProjectController::class, 'deletedocument'])->name('project.deletedocument');


    //Organizaciones
    Route::middleware(['knowroute'])->group(function () {
        Route::get('/admin/organizations/', [OrganizationsController::class, 'index'])->name('organizations.index');
        Route::get('/admin/organizations/create', [OrganizationsController::class, 'create'])->name('organizations.create');
        Route::get('/admin/organizations/edit/{organization}', [OrganizationsController::class, 'edit'])->name('organizations.edit');
        Route::post('/admin/organizations/update/', [OrganizationsController::class, 'update'])->name('organizations.update');

        Route::post('/admin/organizations/', [OrganizationsController::class, 'store'])->name('organizations.store');
        Route::delete('/admin/organizations/{id}', [OrganizationsController::class, 'destroy'])->name('organizations.destroy');

        //Rol organization
        Route::get('/admin/organizations/createRol', [OrganizationsController::class, 'createRol'])->name('organizations.createRol');
        Route::post('/admin/organizations/storeRol', [OrganizationsController::class, 'storeRol'])->name('organizations.storeRol');
        Route::post('/admin/organizations/updateRol/', [OrganizationsController::class, 'updateRol'])->name('organizations.updateRol');
        Route::post('/admin/organizations/destroyRol/', [OrganizationsController::class, 'destroyRol'])->name('organizations.destroyRol');
   
       
    });

    //Routes Users
    require 'admin/users.php';

    //Routes News
    require 'admin/news.php';

    //Routes Events
    require 'admin/events.php';

    //Routes Newsletter
    require 'admin/newletter.php';

    //Routes Complements
    require 'admin/complements.php';

    //Uploads images the CKEditor
    Route::post('/ckeditor/image_upload', [CKEditorController::class, 'upload'])->name('upload');
});
