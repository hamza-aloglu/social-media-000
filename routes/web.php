<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminPanel\HomeController as AdminHomeController;
use App\Http\Controllers\AdminPanel\FaqController as AdminFaqController;
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

});

