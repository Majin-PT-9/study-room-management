<?php

use App\Http\Controllers\SessionController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::prefix('users')->middleware('auth')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('users');
    Route::get('create', [UserController::class, 'create'])->name('users.create');
    Route::post('store', [UserController::class, 'store'])->name('users.store');
    Route::get('edit/{user}', [UserController::class, 'edit'])->name('users.edit');
    Route::post('update/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('delete/{user}', [UserController::class, 'delete'])->name('users.delete');


});

//region sessions

Route::prefix('sessions')->middleware('auth')->group(function () {
//    Route::get('/{session_code}', [SessionController::class, 'session'])->name('session');
    Route::get('list', [SessionController::class, 'index'])->name('sessions');
    Route::get('create', [SessionController::class, 'create'])->name('sessions.create');
    Route::post('store', [SessionController::class, 'store'])->name('sessions.store');
    Route::get('edit/{session}', [SessionController::class, 'edit'])->name('sessions.edit');
    Route::post('update/{session}', [SessionController::class, 'update'])->name('sessions.update');
    Route::delete('delete/{session}', [SessionController::class, 'delete'])->name('sessions.delete');


});

//endregion
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('subjects')->group(function () {
    Route::get('', [SubjectController::class, 'index'])->name('subjects');
    Route::get('create',[SubjectController::class, 'create'])->name('subjects.created-edit');
    Route::post('store', [SubjectController::class, 'store'])->name('subjects.store');
    Route::delete('delete/{subject}', [SubjectController::class, 'delete'])->name('subjects.delete');

});
