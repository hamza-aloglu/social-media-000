<?php

use App\Http\Controllers\AdminPanel\AdminUserController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\CommentController;
use App\Http\Controllers\AdminPanel\FaqController as AdminFaqController;
use App\Http\Controllers\AdminPanel\FriendController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\ImageController as AdminImageController;
use App\Http\Controllers\AdminPanel\MessageController as MessageController;
use App\Http\Controllers\AdminPanel\PostController as AdminPostController;
use App\Http\Controllers\HomePanel\HomeController;
use App\Http\Controllers\HomePanel\SettingsController;
use App\Http\Controllers\HomePanel\UserController;
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


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// HOME ROUTES ****************************************************************
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index') -> name('home');
    Route::get('/post/{id}', 'post') -> name('post');
    Route::get('/postcategory/{id}/{slug}', 'postcategory') ->
    name('postcategory');
    Route::post('/storecomment', 'storeComment') -> name('storecomment');
    Route::post('/storepost', 'storePost') -> name('storepost');
    Route::get('/logoutuser', 'logout') -> name('logoutuser');
});
Route::view('/loginuser', 'home.main-page.loginuser') ->name('loginuser');

// SETTINGS ROUTES ****************************************************************
Route::controller(SettingsController::class)->group(function () {
    Route::get('/about', 'about') -> name('about');
    Route::get('/references', 'references') -> name('references');
    Route::get('/contact', 'contact') -> name('contact');
    Route::post('/storemessage', 'storeMessage') -> name('storemessage');
    Route::get('/faq', 'faq') -> name('faq');
});


// USER ROUTES ****************************************************************
Route::prefix('userpanel')->name('userpanel.')->
controller(UserController::class)->group(function () {
    Route::get('/index/{uid}', 'index') -> name('index');
    Route::get('/comment/{uid}', 'comment') -> name('comment');
    Route::get('/commentDestroy/{id}', 'commentdestroy') -> name('commentdestroy') -> middleware('auth');
    Route::get('/postDestroy/{pid}', 'postdestroy') -> name('postdestroy') -> middleware('auth');
    Route::get('/friend', 'friend') -> name('friend') -> middleware('auth');
    Route::get('/edit', 'edit') -> name('edit') -> middleware('auth');
    Route::get('/friendrequest/{fid}', 'friendRequest') -> name('friendrequest') -> middleware('auth');
    Route::get('/friendaccept/{fid}', 'friendAccept') -> name('friendaccept') -> middleware('auth');
    Route::get('/frienddelete/{fid}', 'friendDelete') -> name('frienddelete') -> middleware('auth');
    Route::post('/editpictures', 'editPictures') -> name('editpictures') -> middleware('auth');
});
Route::get('/searchuser', [UserController::class, 'searchUser'])->name('searchuser');


Route::view('/loginadmin', 'admin.login') ->name('loginadmin');
Route::post('/loginadmincheck', [AdminUserController::class, 'loginadmincheck']) -> name('loginadmincheck');
// ADMIN ROUTES ****************************************************************
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index']) -> name('index');


    Route::resource('faq', AdminFaqController::class);

    Route::resource('category', AdminCategoryController::class);

     Route::resource('post', AdminPostController::class);

     //Image uçacak
    // Image ROUTES ****************************************************************
    Route::prefix('image')->name('image.')->controller(AdminImageController::class)->
    group(function () {
        Route::get('/{pid}', 'index') -> name('index');
        Route::post('/store/{pid}', 'store') -> name('store');
        Route::post('/update/{pid}/{id}', 'update') -> name('update');
        Route::get('delete/{pid}/{id}', 'destroy') -> name('delete');
    });

    Route::resource('message', MessageController::class)->only(['index', 'show', 'destroy']);

    Route::resource('comment', CommentController::class)->only(['index', 'show', 'destroy']);


    // User ROUTES ****************************************************************
    Route::prefix('user')->name('user.')->controller(AdminUserController::class)->
    group(function () {
        Route::get('/', 'index') -> name('index');
        Route::get('/show/{user}', 'show') -> name('show');
        Route::get('destroy/{user}', 'destroy') -> name('destroy');
        Route::post('addroleimage/{uid}', 'addRoleImage') -> name('addroleimage');
        Route::get('destroyrole/{user}/{rid}', 'destroyRole') -> name('destroyrole');
    });

    Route::resource('friend', FriendController::class)->only(['index', 'show', 'destroy']);

    // general routes ****************************************************************
    Route::get('/setting', [AdminHomeController::class, 'setting'])->name('setting');
    Route::post('/settingupdate', [AdminHomeController::class, 'updateSetting'])->name('setting.update');
});

