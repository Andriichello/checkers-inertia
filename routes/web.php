<?php

use App\Http\Controllers\Web\Game\GameController;
use App\Http\Controllers\Web\Home\HomeController;
use App\Http\Controllers\Web\LoginController;
use App\Http\Controllers\Web\LogoutController;
use App\Http\Controllers\Web\RegisterController;
use App\Http\Middleware\RedirectIfUnauthenticated;
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

Route::get('/login', [LoginController::class, 'view'])
    ->name('login.view');
Route::post('/login', [LoginController::class, 'login'])
    ->name('login.post');

Route::get('/register', [RegisterController::class, 'view'])
    ->name('register.view');
Route::post('/register', [RegisterController::class, 'register'])
    ->name('register.post');

Route::post('/logout', [LogoutController::class, 'logout'])
    ->middleware('auth.session')
    ->name('logout.post');

Route::group(['middleware' => ['auth.session', RedirectIfUnauthenticated::class]], function () {
    Route::get('/', [HomeController::class, 'view'])
        ->name('home.view');

    Route::get('/game/{id?}', [GameController::class, 'view'])
        ->name('game.view');
});

