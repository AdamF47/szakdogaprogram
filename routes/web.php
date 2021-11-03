<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Teacher\TeacherController;
use App\Http\Controllers\Coordinator\CoordinatorController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('user')->name('user.')->group(function(){

    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
            Route::view('/login','dashboard.user.login')->name('login');
            Route::view('/register','dashboard.user.register')->name('register');
            Route::post('/create',[UserController::class,'create'])->name('create');
            Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
            Route::view('/home','dashboard.user.home')->name('home');
            Route::post('/logout',[UserController::class,'logout'])->name('logout');
    });


});

Route::prefix('admin')->name('admin.')->group(function(){
       
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
          Route::view('/login','dashboard.admin.login')->name('login');
          Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::post('/logout',[AdminController::class,'logout'])->name('logout');
    });

});

Route::prefix('teacher')->name('teacher.')->group(function(){

    Route::middleware(['guest:teacher','PreventBackHistory'])->group(function(){
         Route::view('/login','dashboard.teacher.login')->name('login');
         Route::view('/register','dashboard.teacher.register')->name('register');
         Route::post('/create',[TeacherController::class,'create'])->name('create');
         Route::post('/check',[TeacherController::class,'check'])->name('check');
    });

    Route::middleware(['auth:teacher','PreventBackHistory'])->group(function(){
         Route::view('/home','dashboard.teacher.home')->name('home');
         Route::post('logout',[TeacherController::class,'logout'])->name('logout');
    });

});

Route::prefix('coordinator')->name('coordinator.')->group(function(){

    Route::middleware(['guest:coordinator','PreventBackHistory'])->group(function(){
         Route::view('/login','dashboard.coordinator.login')->name('login');
         Route::view('/register','dashboard.coordinator.register')->name('register');
         Route::post('/create',[CoordinatorController::class,'create'])->name('create');
         Route::post('/check',[CoordinatorController::class,'check'])->name('check');
    });

    Route::middleware(['auth:coordinator','PreventBackHistory'])->group(function(){
         Route::view('/home','dashboard.coordinator.home')->name('home');
         Route::post('logout',[CoordinatorController::class,'logout'])->name('logout');
    });

});
