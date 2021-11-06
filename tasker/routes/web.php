<?php

use App\Http\Controllers\OAuth\OAuthCallbackController;
use App\Http\Controllers\OAuth\OAuthRedirectController;
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

Route::get('/login', OAuthRedirectController::class)->name('login');
Route::get('/auth/callback', OAuthCallbackController::class);

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');
