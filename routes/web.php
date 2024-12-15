<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::middleware('guest')->controller(AuthController::class)->group(function(){
    Route::get('/', function () {
        return view('Administration.dashboard');
    });
    Route::get('/login','login')->name('show.login');
    Route::get('/register','register')->name('show.register');


});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->controller(AdminController::class)->group(function () {
    Route::get('/', 'index')->name('admin.dashboard');
});

Route::middleware(['auth','role:student'])->prefix('students')->controller(StudentController::class)->group(function(){

});

