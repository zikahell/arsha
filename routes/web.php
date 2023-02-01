<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\NewsController AS NewsControllerr ;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\WhyController;
use App\Http\Controllers\Admin\InfoController;
use App\Http\Controllers\Admin\PlanController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CtaTitleController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\WhyTitleController;
use App\Http\Controllers\Admin\AdvantageController;
use App\Http\Controllers\Admin\HeadTitleController;
use App\Http\Controllers\Admin\TeamTitleController;
use App\Http\Controllers\Admin\SkillTitleController;
use App\Http\Controllers\Admin\PricingTitleController;
use App\Http\Controllers\Admin\ServiceTitleController;
use App\Http\Controllers\Admin\QuestionTitleController;
use App\Http\Controllers\Admin\PortfolioTitleController;

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

Route::get('/', [PageController::class,'index'])->name('page.home');
Route::resource('messages', ContactController::class);
Route::resource('news', NewsController::class);


Route::get('/admin/dashboard', function () {
  return view('home');
})->middleware(['auth'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
  Route::get('show-message', [MessageController::class,'showAllMessages'])->name('admin.message.show');
  Route::delete('delete-message/{id}', [MessageController::class,'destroy'])->name('admin.messages.delete');
  Route::get('create-client', [ClientController::class, 'create'])->name('admin.client.create');
  Route::post('store-client', [ClientController::class, 'store'])->name('admin.client.store');
  Route::get('show-client', [ClientController::class,'index'])->name('admin.client.index');
  Route::delete('delete-client/{id}', [ClientController::class,'destroy'])->name('admin.client.delete');
  Route::resource('teams', TeamController::class);
  Route::resource('service', ServiceController::class);
  Route::resource('about', AboutController::class);
  Route::resource('category', CategoryController::class);
  Route::resource('product', ProductController::class);
  Route::resource('question_title', QuestionTitleController::class);
  Route::resource('question', QuestionController::class);
  Route::resource('service_title', ServiceTitleController::class);
  Route::resource('skill_title', SkillTitleController::class);
  Route::resource('skill', SkillController::class);
  Route::resource('why_title', WhyTitleController::class);
  Route::resource('why', WhyController::class);
  Route::resource('plan', PlanController::class);
  Route::resource('advantage', AdvantageController::class);
  Route::resource('pricing_title', PricingTitleController::class);
  Route::resource('team_title', TeamTitleController::class);
  Route::resource('head_title', HeadTitleController::class);
  Route::resource('portfolio_title', PortfolioTitleController::class);
  Route::resource('cta_title', CtaTitleController::class);
  Route::resource('info', InfoController::class);
  Route::resource('social', SocialController::class);
  Route::get('show-news', [NewsControllerr::class,'showAllNews'])->name('admin.news.show');
  Route::delete('delete-news/{id}', [NewsControllerr::class,'destroy'])->name('admin.news.delete');



});


Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Profile Routes
Route::prefix('profile')->name('profile.')->middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'getProfile'])->name('detail');
    Route::post('/update', [HomeController::class, 'updateProfile'])->name('update');
    Route::post('/change-password', [HomeController::class, 'changePassword'])->name('change-password');
});

// Roles
Route::resource('roles', App\Http\Controllers\RolesController::class);

// Permissions
Route::resource('permissions', App\Http\Controllers\PermissionsController::class);

// Users 
Route::middleware('auth')->prefix('users')->name('users.')->group(function(){
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/edit/{user}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{user}', [UserController::class, 'delete'])->name('destroy');
    Route::get('/update/status/{user_id}/{status}', [UserController::class, 'updateStatus'])->name('status');
    // Route::get('/import-users', [UserController::class, 'importUsers'])->name('import');
    // Route::post('/upload-users', [UserController::class, 'uploadUsers'])->name('upload');
    // Route::get('export/', [UserController::class, 'export'])->name('export');
});

