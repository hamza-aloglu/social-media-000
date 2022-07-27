<?php

use App\Http\Controllers\AdminPanel\UserController as AdminUserController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\CommentController;
use App\Http\Controllers\AdminPanel\FaqController as AdminFaqController;
use App\Http\Controllers\AdminPanel\FriendController as AdminFriendController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\ImageController as AdminImageController;
use App\Http\Controllers\AdminPanel\MessageController as MessageController;
use App\Http\Controllers\AdminPanel\PostController as AdminPostController;
use App\Http\Controllers\HomePanel\FriendController;
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
    Route::get('/', 'index')->name('home');
    Route::get('/post/{post}', 'getPostPage')->name('post');
    Route::get('/postcategory/{category}', 'postCategory')->name('postcategory');
    Route::post('/storecomment', 'storeComment')->name('storecomment');
    Route::post('/storepost', 'storePost')->name('storepost');
    Route::get('/logoutuser', 'logout')->name('logoutuser');
});
Route::view('/loginuser', 'home.main-page.loginuser')->name('loginuser');

// SETTINGS ROUTES ****************************************************************
Route::controller(SettingsController::class)->group(function () {
    Route::get('/about', 'about')->name('about');
    Route::get('/references', 'references')->name('references');
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/storemessage', 'storeMessage')->name('storemessage');
    Route::get('/faq', 'faq')->name('faq');
});


// USER ROUTES ****************************************************************
Route::prefix('userpanel')->name('userpanel.')->
controller(UserController::class)->group(function () {
    Route::get('/index/{user}', 'index')->name('index');
    Route::get('/comments/{user}', 'getCommentsOfTheUser')->name('comments');
    Route::get('/commentDestroy/{comment}', 'commentdestroy')->name('commentdestroy')->middleware('auth');
    Route::get('/postDestroy/{post}', 'postdestroy')->name('postdestroy')->middleware('auth');
    Route::get('/edit', 'edit')->name('edit')->middleware('auth');
    Route::post('/updatepictures', 'updatePictures')->name('updatepictures')->middleware('auth');
});

// FRIEND ROUTES **************************************************
Route::prefix('userpanel')->name('userpanel.')
->controller(FriendController::class)->middleware('auth')->group(function () {
   Route::get('/friend', 'index')->name('friend');
   Route::get('/friendrequest/{fid}', 'friendRequest')->name('friendrequest');
   Route::get('/friendaccept/{fid}', 'friendAccept')->name('friendaccept');
   Route::get('/frienddelete/{fid}', 'friendDelete')->name('frienddelete');
});


Route::get('/searchuser', [UserController::class, 'searchUsers'])->name('searchuser');


Route::view('/loginadmin', 'admin.login')->name('loginadmin');
Route::post('/loginadmincheck', [AdminUserController::class, 'loginadmincheck'])->name('loginadmincheck');
// ADMIN ROUTES ****************************************************************
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('index');


    Route::resource('faq', AdminFaqController::class);

    Route::resource('category', AdminCategoryController::class);

    Route::resource('post', AdminPostController::class);

    //Image uçacak
    // Image ROUTES ****************************************************************
    Route::prefix('image')->name('image.')->controller(AdminImageController::class)->
    group(function () {
        Route::get('/{pid}', 'index')->name('index');
        Route::post('/store/{pid}', 'store')->name('store');
        Route::post('/update/{pid}/{id}', 'update')->name('update');
        Route::get('delete/{pid}/{id}', 'destroy')->name('delete');
    });

    Route::resource('message', MessageController::class)->only(['index', 'show', 'destroy']);

    Route::resource('comment', CommentController::class)->only(['index', 'show', 'destroy']);


    // User ROUTES ****************************************************************
    Route::prefix('user')->name('user.')->controller(AdminUserController::class)->
    group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{user}', 'show')->name('show');
        Route::get('destroy/{user}', 'destroy')->name('destroy');
        Route::post('addroleimage/{uid}', 'addRoleImage')->name('addroleimage');
        Route::get('destroyrole/{user}/{rid}', 'destroyRole')->name('destroyrole');
    });

    Route::resource('friend', AdminFriendController::class)->only(['index', 'show', 'destroy']);

    // general routes ****************************************************************
    Route::get('/setting', [AdminHomeController::class, 'setting'])->name('setting');
    Route::post('/settingupdate', [AdminHomeController::class, 'updateSetting'])->name('setting.update');
});

