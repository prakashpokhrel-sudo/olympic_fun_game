<?php
use App\Http\Controllers\AdminController;
use App\Http\Controllers\frontend\IndexController;
use App\Http\Controllers\backend\SportsCategory;
use App\Http\Controllers\backend\SponcerController;
use App\Http\Controllers\backend\CountryController;
use App\Http\Controllers\backend\LiveGameController;
use App\Http\Controllers\backend\UpComingGameController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\AdminProfileController;
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
// Single Post Page
Route::get('/view/post/{id}', [HomeController::class, 'SinglePost']);



//forntendController
Route::get('/',[IndexController::class, 'home']);
Route::get('/home',[IndexController::class, 'index'])->name('home');
Route::get('/user/logout',[IndexController::class, 'UserLogOut'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');
Route::get('/user/profile/edit', [IndexController::class, 'UserProfileEdit'])->name('user.profile.edit');
Route::post('/user/profile/store',[IndexController::class, 'UserProfileStore'])->name('user.profile.store');

Route::group(['prefix'=>'admin', 'middleware'=>['admin:admin']], function(){
Route::get('/login',[AdminController::class, 'loginForm']);
Route::post('/login',[AdminController::class, 'store'])->name('admin.login');

});

//admin
Route::middleware(['auth:admin'])->group(function(){


Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
    return view('admin.index');
})->name('admin.dashboard')->middleware('auth:admin');

// Admin All Routes 

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');

Route::get('/admin/profile/edit', [AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit');

Route::post('/admin/profile/store', [AdminProfileController::class, 'AdminProfileStore'])->name('admin.profile.store');

Route::get('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password');

Route::post('/update/change/password', [AdminProfileController::class, 'AdminUpdateChangePassword'])->name('update.change.password');

});  // end Middleware admin


Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Admin sponcer all routes
Route::prefix('sponcer')->group(function(){
Route::get('/view',[SponcerController::class, 'sponcerview'])->name('all.sponcer');
Route::post('/add_sponcer',[SponcerController::class, 'addsponcer'])->name('add.sponcer');
Route::get('/delete_sponcer/{id}',[SponcerController::class, 'deletesponcer'])->name('delete.sponcer');
Route::post('/update_sponcer/{id}',[SponcerController::class, 'updatesponcer'])->name('update.sponcer');

});


// Admin all category 
Route::prefix('category')->group(function(){
Route::get('/view',[SportsCategory::class, 'sportscategory'])->name('view.category');
Route::post('/add_category',[SportsCategory::class, 'addcategory'])->name('add.category');
Route::get('/delete_category/{id}',[SportsCategory::class, 'deletecategory'])->name('delete.category');
Route::post('/update_category/{id}',[SportsCategory::class, 'updatecategory'])->name('update.category');

});

// Admin all Conntry 
Route::prefix('country')->group(function(){
Route::get('/view',[CountryController::class, 'viewcountry'])->name('view.country');
Route::post('/add_country',[CountryController::class, 'addcountry'])->name('add.country');
Route::get('/delete_country/{id}',[CountryController::class, 'deletecountry'])->name('delete.country');
Route::post('/update_country/{id}',[CountryController::class, 'updatecountry'])->name('update.country');
Route::post('/upload_image',[PostController::class,'uploadImage'])->name('upload');

});

// Admin all livegame
Route::prefix('liveGame')->group(function(){
Route::get('/view',[LiveGameController::class, 'viewlivegame'])->name('view.livegame');
Route::post('/add_livegames',[LiveGameController::class, 'addlivegames'])->name('add.livegame');
Route::get('/delete_livegames/{id}',[LiveGameController::class, 'deletelivegame'])->name('delete.livegame');
Route::post('/update_livegames/{id}',[LiveGameController::class, 'updatelivegame'])->name('update.livegame');

//active and inactive livetv

Route::get('/live_tv/active{id}',[LiveGameController::class, 'Activesetting'])->name('active.livetv');
Route::get('/live_tv/inactive{id}',[LiveGameController::class, 'inactivesetting'])->name('inactive.livetv');


});

// Admin all upcoming games
Route::prefix('upcoming_game')->group(function(){
Route::get('/view',[UpComingGameController::class, 'viewupcominggame'])->name('view.upcominggame');
Route::post('/add_upcoming_games',[UpComingGameController::class, 'addupcominggames'])->name('add.upcominggame');
Route::get('/delete_upcoming_games/{id}',[UpComingGameController::class, 'deleteupcominggame'])->name('delete.upcomingGames');
Route::post('/update_upcoming_games/{id}',[UpComingGameController::class, 'updateupdategame'])->name('update.upcomingGames');
});

// Home page category

Route::get('/catpost/{id}/{category_en}', [HomeController::class, 'CatPost']);


Route::get('livegames/{categorySlug}', [HomeController::class, 'findbasedcategory'])->name('category.show');



//admin profile
