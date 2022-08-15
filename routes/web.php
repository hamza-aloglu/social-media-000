<?php

use App\Http\Controllers\AdminPanel\RoleController as AdminRoleController;
use App\Http\Controllers\AdminPanel\UserController as AdminUserController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\CommentController as AdminCommentController;
use App\Http\Controllers\AdminPanel\FaqController as AdminFaqController;
use App\Http\Controllers\AdminPanel\FriendController as AdminFriendController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\MessageController as AdminMessageController;
use App\Http\Controllers\AdminPanel\PostController as AdminPostController;
use App\Http\Controllers\HomePanel\FriendController;
use App\Http\Controllers\HomePanel\HomeController;
use App\Http\Controllers\HomePanel\LikeController;
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
    Route::get('/contact', 'contact')->name('contact');
    Route::post('/storemessage', 'storeMessage')->name('storemessage');
});

// USER ROUTES ****************************************************************
Route::prefix('userpanel')->name('userpanel.')->
controller(UserController::class)->group(function () {
    Route::get('/index/{user}', 'index')->name('index');
    Route::get('/comments/{user}', 'getCommentsOfTheUser')->name('comments');
    Route::middleware('auth')->group(function () {
        Route::post('like', [LikeController::class, 'like'])->name('like');
        Route::delete('like', [LikeController::class, 'unlike'])->name('unlike');
        Route::get('/commentDestroy/{comment}', 'commentdestroy')->name('commentdestroy');
        Route::get('/postDestroy/{post}', 'postdestroy')->name('postdestroy');
        Route::get('/edit', 'edit')->name('edit');
        Route::post('/updatepictures', 'updatePictures')->name('updatepictures');

    });
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


// ADMIN ROUTES ****************************************************************
Route::view('/loginadmin', 'admin.login')->name('loginadmin');
Route::post('/loginadmincheck', [AdminUserController::class, 'loginadmincheck'])->name('loginadmincheck');

Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('index');
    Route::post('/role/store', [AdminRoleController::class, 'store'])->name('role.store');

    Route::resource('faq', AdminFaqController::class);

    Route::resource('category', AdminCategoryController::class);

    Route::resource('post', AdminPostController::class);

    Route::resource('message', AdminMessageController::class)->only(['index', 'show', 'destroy']);

    Route::resource('comment', AdminCommentController::class)->only(['index', 'show', 'destroy']);


    // User ROUTES ****************************************************************
    Route::prefix('user')->name('user.')->controller(AdminUserController::class)->
    group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/show/{user}', 'show')->name('show');
        Route::get('destroy/{user}', 'destroy')->name('destroy');
        Route::post('addrole/{uid}', 'addRole')->name('addrole');
        Route::get('destroyrole/{user}/{rid}', 'destroyRole')->name('destroyrole');
    });

    Route::resource('friend', AdminFriendController::class)->only(['index', 'show', 'destroy']);

    // general routes ****************************************************************
    Route::get('/setting', [AdminHomeController::class, 'setting'])->name('setting');
    Route::post('/settingupdate', [AdminHomeController::class, 'updateSetting'])->name('setting.update');
});

