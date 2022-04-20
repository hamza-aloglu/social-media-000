<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\FaqController as AdminFaqController;
use App\Http\Controllers\AdminPanel\CategoryController as AdminCategoryController;
use App\Http\Controllers\AdminPanel\PostController as AdminPostController;
use App\Http\Controllers\AdminPanel\ImageController as AdminImageController;
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
    return view('home.index');
});


Route::get('/welcome', function () {
    return view('welcome');
});

// routing to view
Route::get('/greetings', function () {
    return 'Hello World';
});

// routing to controller
Route::get('/', [HomeController::class, 'index']);

// routing -> controller -> view
Route::get('/test', [HomeController::class, 'test']);

// routing with parameter
Route::get('/param/{id}/{number}', [HomeController::class, 'param']);
Route::get('/show/{id}/{name}', [HomeController::class, 'showView']);

//
Route::post('/save', [HomeController::class, 'save']);



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// ADMIN ROUTES ****************************************************************
Route::prefix('admin')->name('admin.')->group(function () {
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
});

