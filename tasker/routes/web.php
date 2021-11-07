<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OAuth\OAuthCallbackController;
use App\Http\Controllers\OAuth\OAuthRedirectController;
use App\Http\Controllers\TaskCompleteController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TaskCreateController;
use App\Http\Controllers\TaskReassignController;
use App\Http\Controllers\TaskStoreController;
use Illuminate\Support\Facades\Auth;
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
    return view('home');
});

Route::get('/login', OAuthRedirectController::class)->name('login');
Route::get('/auth/callback', OAuthCallbackController::class);

Route::middleware(['auth'])->group(callback: static function () {
    Route::get('/logout', function () {
        Auth::logout();

        return redirect('/');
    });

    Route::get('/welcome', function () {
        return view('welcome');
    });


    Route::get('/tasks', TaskController::class)->name('tasks.index');
    Route::get('/tasks/create', TaskCreateController::class)->name('tasks.create');
    Route::post('/tasks', TaskStoreController::class)->name('tasks.store');
    Route::get('/tasks/{task}/complete', TaskCompleteController::class)->name('tasks.complete');

    Route::get('/tasks/reassign', TaskReassignController::class)->name('tasks.reassign')->middleware('can:reassign');
});