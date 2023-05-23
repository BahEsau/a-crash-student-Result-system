<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// the user section
Route::prefix('user')->name('user.')->group(function () {
    Route::middleware(['guest:web'])->group(function () {
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::post('/dologin', [UserController::class, 'doLogin'])->name('dologin');
    });

    Route::middleware(['auth:web'])->group(function () {

        Route::get('/showLevels', [UserController::class, 'showLevels'])->name('showLevels');//goes to the showLevels function in the controller and then return the view with the levels
        Route::view('/registerLevels', 'dashboard.user.registerLevels')->name('registerLevels'); //return the registerLevels page
        Route::post('/createLevels', [UserController::class, 'createLevels'])->name('createLevels');// goes to the createLevels function in the UserController
        Route::view('/home', 'dashboard.user.home')->name('home');
        Route::post('/logout', [UserController::class, 'logout'])->name('logout');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create', [UserController::class, 'create'])->name('create');
        Route::post('/createCourses', [UserController::class, 'createCourses'])->name('createCourses');

        Route::get('/registerNotes', [UserController::class, 'showInfo2'])->name('registerNotes');//goes to the function showInfo2 and returns values withe the registerNote page
        Route::post('/createNotes', [UserController::class, 'createNotes'])->name('createNotes');
        Route::post('/createStudent', [UserController::class, 'createStudent'])->name('createStudent');
        Route::get('/showInfo',  [UserController::class, 'showInfo'])->name('registerStudent');
        Route::get('/viewDetails',  [UserController::class, 'viewDetails'])->name('viewDetails');
        Route::get('/note/view/{id}',  [UserController::class, 'showNotes'])->name('showNotes');
        Route::get('/note/destroy/{id}',  [UserController::class, 'destroy'])->name('Delete');
        Route::get('update/{id}',  [UserController::class, 'update'])->name('update');
        Route::post('/note/store/{id}',  [UserController::class, 'store'])->name('store');


    });
});
// student section
Route::prefix('student')->name('student.')->group(function () {
    Route::middleware(['guest:student'])->group(function () {
        Route::view('/login', 'dashboard.student.login')->name('login');
        Route::post('/dologin', [StudentController::class, 'doLogin'])->name('dologin');
    });

    Route::middleware(['auth:student'])->group(function () {
        Route::get('/show', [StudentController::class, 'show'])->name('show');
        Route::get('/home', [StudentController::class, 'show'])->name('home');
        Route::get('/Download', [StudentController::class, 'Download'])->name('Download');
        Route::post('/logout', [StudentController::class, 'logout'])->name('logout');
    });
});
