<?php

use App\Http\Controllers\TeamController;
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
    return view('index');
});



// ================== Routes for User ==================
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [UserController::class, 'login_user'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/register', [UserController::class, 'register_user'])->middleware('guest');

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth');
Route::get('/profile/{tab}', [UserController::class, 'profileTab'])->middleware('auth');

// ================== Routes for Team ==================
Route::get('/teams', [TeamController::class, 'teams'] );
Route::get('/teams/create', [TeamController::class, 'create'] )->middleware('auth');
Route::post('/teams/create', [TeamController::class, 'create_team'] )->middleware('auth');
Route::get('/teams/{team}', [TeamController::class, 'single'] );