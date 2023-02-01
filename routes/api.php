<?php
use Illuminate\Http\Request;
// use App\Http\Controllers\Admin\Api\MessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WhyController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\InfoController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\SkillController;
use App\Http\Controllers\Api\SocialController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CtaTitleController;
use App\Http\Controllers\Api\QuestionController;
use App\Http\Controllers\Api\WhyTitleController;
use App\Http\Controllers\Api\AdvantageController;
use App\Http\Controllers\Api\HeadTitleController;
use App\Http\Controllers\Api\TeamTitleController;
use App\Http\Controllers\Api\SkillTitleController;
use App\Http\Controllers\Api\PricingTitleController;
use App\Http\Controllers\Api\ServiceTitleController;
use App\Http\Controllers\Api\QuestionTitleController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\PageController;
use App\Http\Controllers\Api\PortfolioTitleController;
use App\Http\Controllers\Api\ClientController AS ClientControllerr;
use App\Http\Controllers\Api\ContactController AS ContactControllerr;

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
Route::group([
  'middleware' => 'api',
  'prefix' => 'auth'
], function ($router) {
  Route::post('/login', [AuthController::class, 'login']);
  // Route::post('/register', [AuthController::class, 'register']);
  Route::post('/logout', [AuthController::class, 'logout']);
  Route::post('/refresh', [AuthController::class, 'refresh']);
  Route::get('/user-profile', [AuthController::class, 'userProfile']);    
});
Route::group(['middleware' => ['jwt.verify']], function () {
  Route::resource('messages', ContactControllerr::class);
  Route::post('store-client', [ClientControllerr::class, 'store'])->name('admin.client.store');
  Route::get('show-client', [ClientControllerr::class, 'index'])->name('admin.client.index');
  Route::delete('delete-client/{id}', [ClientControllerr::class, 'destroy'])->name('admin.client.delete');
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
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
