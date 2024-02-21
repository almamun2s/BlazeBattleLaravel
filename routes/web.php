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
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest'); // Showing login form
Route::post('/login', [UserController::class, 'login_user'])->middleware('guest'); // Submitting login form
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth'); // Submitting logout form
Route::get('/register', [UserController::class, 'register'])->middleware('guest'); // Showing registration form
Route::post('/register', [UserController::class, 'register_user'])->middleware('guest'); // Submitting registration form

Route::get('/profile', [UserController::class, 'profile'])->middleware('auth'); // Showing profile
Route::put('/profile/edit', [UserController::class, 'profile_edit'])->middleware('auth'); // Submitting profile edit
Route::get('/profile/{tab}', [UserController::class, 'profileTab'])->middleware('auth'); // Showing profile with tab

// ================== Routes for Team ==================
Route::get('/teams', [TeamController::class, 'teams'] ); // Showing Teams
Route::get('/teams/create', [TeamController::class, 'create'] )->middleware('auth'); // Showing Team create form
Route::post('/teams/create', [TeamController::class, 'create_team'] )->middleware('auth'); // Submitting Team create form
Route::put('/teams/join', [TeamController::class, 'teams_join'])->middleware('auth'); // Submitting Team join form
Route::put('/teams/leave', [TeamController::class, 'teams_leave'])->middleware('auth'); // Submitting Team join form
Route::put('/teams/remove', [TeamController::class, 'remove_member'])->middleware('auth'); // Removing Team member from the Team by Team leader
Route::get('/teams/{team}', [TeamController::class, 'single'] ); // Showing Single Team 