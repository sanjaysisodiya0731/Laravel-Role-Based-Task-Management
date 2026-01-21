<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::middleware(['auth'])->group(function(){
    Route::controller(DashboardController::class)->group(function(){
        Route::get('/dashboard','create')->name('dashboard');
    });
});

Route::controller(AuthController::class)->group(function(){
    Route::get('/login','loginForm')->name('login');
    Route::post('/login/action','loginAction')->name('login.action');
    Route::get('/registration','registrationForm')->name('registration.form');
    Route::post('/registration/action','registrationAction')->name('registration.action');
    Route::get('/logout','logout')->name('logout');
});

//For admin only
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/task/create',[TaskController::class,'create'])->name('task.create');
    Route::post('/task/store',[TaskController::class,'store'])->name('task.store');
    Route::get('/tasks/index',[TaskController::class,'index'])->name('tasks.index');
    Route::delete('/task/delete/{id}',[TaskController::class,'destroy'])->name('task.delete');
    Route::get('/task/create-assign/{id}',[TaskController::class,'createAssign'])->name('task.assign.create');
    Route::post('/task/assign-store',[TaskController::class,'storeAssign'])->name('task.assign.store');
});
    

//For Manager only
Route::middleware(['auth','role:manager'])->group(function(){
    Route::post('/task/assign-store',[TaskController::class,'storeAssign'])->name('task.assign.store');
});

//For Employee only
Route::middleware(['auth','role:employee'])->group(function(){
    Route::get('/task/assigned-list',[TaskController::class,'assignedList'])->name('task.assigned.list');
});