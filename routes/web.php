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

use App\Models\Service;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UtilisateurController;
use Illuminate\Support\Facades\Artisan;

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/about', [HomeController::class,'about'])->name('about');
Route::get('/services', [HomeController::class,'services'])->name('services');
Route::get('/posts', [HomeController::class,'posts'])->name('posts');
Route::get('/post/{id}', [HomeController::class,'post'])->name('post');
Route::get('/service/{id}', [HomeController::class,'service'])->name('service');
Route::get('/projects', [HomeController::class,'projects'])->name('projects');
Route::get('/references', [HomeController::class,'references'])->name('references');
Route::post('/demande', [HomeController::class,'demande'])->name('demande');
Route::get('/contact', [HomeController::class,'contact'])->name('contact');
Route::post('contact-us', [HomeController::class,'savecontact'])->name('contact_us');

// Espace client :
Route::get('/espace-client', [HomeController::class,'espace'])->name('espace')->middleware('AlreadyLog');
Route::get('/check', [HomeController::class,'check'])->name('check');
Route::post('/check', [HomeController::class,'check'])->name('check');
Route::get('/logOut', [HomeController::class,'logOut'])->name('logOut');


Route::get('/INSTALL', function () {
	Artisan::call('cache:clear');
    Artisan::call('migrate', ["--force" => true ]);
	Artisan::call('migrate:refresh', ['--seed' => true]);
	Artisan::call('db:seed');
    return ["done" => true];
});

Route::middleware(['guest'])->group(function() {
	Route::get('/login', [LoginController::class,'index'])->name('login');
	Route::post('/login', [LoginController::class,'login']);
});
Route::middleware(['auth:web'])->group(function() {
	Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
	Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

	//Services
	Route::get('/dashboard/services', [DashboardController::class, 'services'])->name('dashboard.services');
	Route::get('/dashboard/add-service', [DashboardController::class, 'add_service'])->name('dashboard.add_service');
	Route::post('/dashboard/add-service', [DashboardController::class, 'store_service']);
	Route::get('/dashboard/edit-service/{id}', [DashboardController::class, 'edit_service'])->name('dashboard.edit_service');
	Route::post('/dashboard/edit-service/{id}', [DashboardController::class, 'store_service']);
	Route::get('/dashboard/delete-service/{id}', [DashboardController::class, 'delete_service'])->name('dashboard.delete_service');
	//End services

	//Demandes
	Route::get('/dashboard/demandes', [DashboardController::class, 'demandes'])->name('dashboard.demandes');
	Route::get('/dashboard/delete-demande/{id}', [DashboardController::class, 'delete_demande'])->name('dashboard.delete_demande');
	//End demandes

	//Projects
	Route::get('/dashboard/projects', [DashboardController::class, 'projects'])->name('dashboard.projects');
	Route::get('/dashboard/add-project', [DashboardController::class, 'add_project'])->name('dashboard.add_project');
	Route::post('/dashboard/add-project', [DashboardController::class, 'store_project']);
	Route::get('/dashboard/edit-project/{id}', [DashboardController::class, 'edit_project'])->name('dashboard.edit_project');
	Route::post('/dashboard/edit-project/{id}', [DashboardController::class, 'store_project']);
	Route::get('/dashboard/delete-project/{id}', [DashboardController::class, 'delete_project'])->name('dashboard.delete_project');
	//End projects


	//Posts
	Route::get('/dashboard/posts', [DashboardController::class, 'posts'])->name('dashboard.posts');
	Route::get('/dashboard/add-post', [DashboardController::class, 'add_post'])->name('dashboard.add_post');
	Route::get('/dashboard/edit-post/{id}', [DashboardController::class, 'edit_post'])->name('dashboard.edit_post');
	Route::post('/dashboard/add-post', [DashboardController::class, 'store_post']);
	Route::post('/dashboard/edit-post/{id}', [DashboardController::class, 'store_post']);
	Route::get('/dashboard/delete-post/{id}', [DashboardController::class, 'delete_post'])->name('dashboard.delete_post');
	//End posts

	Route::get('/dashboard/requests', [DashboardController::class, 'requests'])->name('dashboard.requests');
	Route::get('/dashboard/admins', [DashboardController::class, 'admins'])->name('dashboard.admins');
	Route::get('/dashboard/add-admin', [DashboardController::class, 'add_admin'])->name('dashboard.add_admin');
	Route::get('/dashboard/edit-admin/{id}', [DashboardController::class, 'edit_admin'])->name('dashboard.edit_admin');
	Route::post('/dashboard/add-admin', [DashboardController::class, 'store_user']);
	Route::post('/dashboard/edit-admin/{id}', [DashboardController::class, 'store_user']);
	Route::get('/dashboard/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
	Route::post('/dashboard/settings', [DashboardController::class, 'storeSettings']);

	//
	Route::get('/dashboard/apropos', [DashboardController::class, 'apropos'])->name('dashboard.apropos');
	Route::post('/dashboard/apropos', [DashboardController::class, 'storeapropos']);
	Route::get('/dashboard/delete-apropos/{id}', [DashboardController::class, 'delete_apropos'])->name('dashboard.delete_apropos');

	//reference
	Route::get('/dashboard/reference', [DashboardController::class, 'reference'])->name('dashboard.reference');
	Route::get('/dashboard/add-reference', [DashboardController::class, 'add_reference'])->name('dashboard.add_reference');
	Route::get('/dashboard/edit-reference/{id}', [DashboardController::class, 'edit_reference'])->name('dashboard.edit_reference');
	Route::post('/dashboard/add-reference', [DashboardController::class, 'store_reference']);
	Route::post('/dashboard/edit-reference/{id}', [DashboardController::class, 'store_reference']);
	Route::get('/dashboard/delete-reference/{id}', [DashboardController::class, 'delete_reference'])->name('dashboard.delete_reference');

	//
	Route::get('/dashboard/temoignage', [DashboardController::class, 'temoignage'])->name('dashboard.temoignage');
	Route::get('/dashboard/add-temoignage', [DashboardController::class, 'add_temoignage'])->name('dashboard.add_temoignage');
	Route::get('/dashboard/edit-temoignage/{id}', [DashboardController::class, 'edit_temoignage'])->name('dashboard.edit_temoignage');
	Route::post('/dashboard/add-temoignage', [DashboardController::class, 'store_temoignage']);
	Route::post('/dashboard/edit-temoignage/{id}', [DashboardController::class, 'store_temoignage']);
	Route::get('/dashboard/delete-temoignage/{id}', [DashboardController::class, 'delete_temoignage'])->name('dashboard.delete_temoignage');
	//
	Route::get('/dashboard/contact', [DashboardController::class, 'contact'])->name('dashboard.contact');
	Route::get('/dashboard/delete-contact/{id}', [DashboardController::class, 'delete_contact'])->name('dashboard.delete_contact');

});

Route::get("/deleteImageProject/",function(\Illuminate\Http\Request $request){
    $id = $request['id'];
    $img = $request['image'];
    $project = \App\Models\Project::find($id);
    $images = explode(",", $project->image);
    $index = array_search($img, $images);
    unset($images[$index]);
    $project->image = implode(",", $images);
    return $project->save();
});

//Utilisateur :

Route::get('/dashboard/utilisateur', [DashboardController::class, 'utilisateur'])->name('dashboard.utilisateur');
Route::get('/dashboard/add-utilisateur', [DashboardController::class, 'add_utilisateur'])->name('dashboard.add-utilisateur');
Route::post('/dashboard/store-utilisateur', [DashboardController::class, 'store_utilisateur'])->name('dashboard.store-utilisateur');
Route::get('/dashboard/edit-utilisateur/{id}', [DashboardController::class, 'edit_utilisateur'])->name('dashboard.edit-utilisateur');
Route::put('/dashboard/update-utilisateur/{id}', [DashboardController::class, 'update_utilisateur'])->name('dashboard.update-utilisateur');
Route::delete('/dashboard/delete-utilisateur/{id}', [DashboardController::class, 'delete_utilisateur'])->name('dashboard.delete-utilisateur');
Route::get('/dashboard/show/{id}', [DashboardController::class, 'show_utilisateur'])->name('dashboard.show-utilisateur');

//Fichier utilisateur :
Route::get('/dashboard/add-fichier/{id}', [DashboardController::class, 'add_fichier_utilisateur'])->name('dashboard.add-fichier-utilisateur');
Route::post('/dashboard/store-fichier', [DashboardController::class, 'store_fichier_utilisateur'])->name('dashboard.store-fichier-utilisateur');



