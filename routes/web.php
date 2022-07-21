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
Route::get('home', function () {
    return view('home.main-page.index');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// HOME ROUTES ****************************************************************
Route::get('/', [HomeController::class, 'index']) -> name('home');
Route::get('/post/{id}', [HomeController::class, 'post']) -> name('post');
Route::get('/postcategory/{id}/{slug}', [HomeController::class, 'postcategory']) ->
    name('postcategory');
Route::post('/storecomment', [HomeController::class, 'storeComment']) -> name('storecomment');
Route::post('/storepost', [HomeController::class, 'storePost']) -> name('storepost');

Route::view('/loginuser', 'home.main-page.loginuser') ->name('loginuser');
Route::get('/logoutuser', [HomeController::class, 'logout']) -> name('logoutuser');

Route::view('/loginadmin', 'admin.login') ->name('loginadmin');
Route::post('/loginadmincheck', [AdminUserController::class, 'loginadmincheck']) -> name('loginadmincheck');

// SETTINGS ROUTES ****************************************************************
Route::get('/about', [SettingsController::class, 'about']) -> name('about');
Route::get('/references', [SettingsController::class, 'references']) -> name('references');
Route::get('/contact', [SettingsController::class, 'contact']) -> name('contact');
Route::post('/storemessage', [SettingsController::class, 'storeMessage']) -> name('storemessage');
Route::get('/faq', [SettingsController::class, 'faq']) -> name('faq');

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


// ADMIN ROUTES ****************************************************************
Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminHomeController::class, 'index']) -> name('index');
    // FAQ ROUTES ****************************************************************
    Route::prefix('faq')->name('faq.')->controller(AdminFaqController::class)->group(function () {
        Route::get('/', 'index') -> name('index');
        Route::get('/create', 'create') -> name('create');
        Route::post('/store', 'store') -> name('store');
        Route::get('/edit/{id}', 'edit') -> name('edit');
        Route::post('/update/{id}', 'update') -> name('update');
        Route::get('/show/{id}', 'show') -> name('show');
        Route::get('delete/{id}', 'destroy') -> name('delete');
    });
    // CATEGORY ROUTES ****************************************************************
    Route::prefix('category')->name('category.')->controller(AdminCategoryController::class)->
    group(function () {
        Route::get('/', 'index') -> name('index');
        Route::get('/create', 'create') -> name('create');
        Route::post('/store', 'store') -> name('store');
        Route::get('/edit/{id}', 'edit') -> name('edit');
        Route::post('/update/{id}', 'update') -> name('update');
        Route::get('/show/{id}', 'show') -> name('show');
        Route::get('delete/{id}', 'destroy') -> name('delete');
    });
    // Post ROUTES ****************************************************************
    Route::prefix('post')->name('post.')->controller(AdminPostController::class)->
    group(function () {
        Route::get('/', 'index') -> name('index');
        Route::get('/create', 'create') -> name('create');
        Route::post('/store', 'store') -> name('store');
        Route::get('/edit/{id}', 'edit') -> name('edit');
        Route::post('/update/{id}', 'update') -> name('update');
        Route::get('/show/{id}', 'show') -> name('show');
        Route::get('delete/{id}', 'destroy') -> name('delete');
    });
    // Image ROUTES ****************************************************************
    Route::prefix('image')->name('image.')->controller(AdminImageController::class)->
    group(function () {
        Route::get('/{pid}', 'index') -> name('index');
        Route::post('/store/{pid}', 'store') -> name('store');
        Route::post('/update/{pid}/{id}', 'update') -> name('update');
        Route::get('delete/{pid}/{id}', 'destroy') -> name('delete');
    });
    // Message ROUTES ****************************************************************
    Route::prefix('message')->name('message.')->controller(MessageController::class)->
    group(function () {
        Route::get('/', 'index') -> name('index');
        Route::get('/show/{id}', 'show') -> name('show');
        Route::get('destroy/{id}', 'destroy') -> name('destroy');
        Route::post('update/{id}', 'update') -> name('update');
    });
    // Comment ROUTES ****************************************************************
    Route::prefix('comment')->name('comment.')->controller(CommentController::class)->
    group(function () {
        Route::get('/', 'index') -> name('index');
        Route::get('/show/{id}', 'show') -> name('show');
        Route::get('destroy/{id}', 'destroy') -> name('destroy');
        Route::post('update/{id}', 'update') -> name('update');
    });
    // User ROUTES ****************************************************************
    Route::prefix('user')->name('user.')->controller(AdminUserController::class)->
    group(function () {
        Route::get('/', 'index') -> name('index');
        Route::get('/edit/{id}', 'edit') -> name('edit');
        Route::get('/show/{id}', 'show') -> name('show');
        Route::get('destroy/{id}', 'destroy') -> name('destroy');
        Route::post('update/{id}', 'update') -> name('update');
        Route::post('addroleimage/{id}', 'addRoleImage') -> name('addroleimage');
        Route::get('destroyrole/{uid}/{rid}', 'destroyRole') -> name('destroyrole');
    });
    // Friend ROUTES ****************************************************************
    Route::prefix('friend')->name('friend.')->controller(FriendController::class)->
    group(function () {
        Route::get('/', 'index') -> name('index');
        Route::get('/edit/{id}', 'edit') -> name('edit');
        Route::get('/show/{id}', 'show') -> name('show');
        Route::get('destroy/{id}', 'destroy') -> name('destroy');
        Route::post('update/{id}', 'update') -> name('update');
    });

    // general routes ****************************************************************
    Route::get('/setting', [AdminHomeController::class, 'setting'])->name('setting');
    Route::post('/settingupdate', [AdminHomeController::class, 'updateSetting'])->name('setting.update');
});

