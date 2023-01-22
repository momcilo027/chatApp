<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\msgsController;
use App\Http\Controllers\userController;

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

// Check for session
Route::get('/', [userController::class, 'startup']);

// Show EditUser
Route::get('/user/{id}/edit', [userController::class, 'edit']);

// Edit editUserInfo
Route::put('/user/{id}/update', [userController::class, 'update']);

// Delete userInfo
Route::delete('/user/{id}/delete', [userController::class, 'destroy']);

// Users Registration Page
Route::get('/signup', [userController::class, 'create']);

// User Create
Route::post('/users', [userController::class, 'store']);

// Login_Form Page
Route::get('/login', [userController::class, 'login']);

// Login User
Route::post('/loginUser', [userController::class, 'loginUser']);

// Logout User 
Route::post('/logout', [userController::class, 'logout']);

// Message Send
Route::post('/chat', [msgsController::class, 'store']);


