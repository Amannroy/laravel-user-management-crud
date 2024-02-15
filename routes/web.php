<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\AuthController;
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

// Route::get('/login', function () {
//     return view('login');
// });

//Signup
Route::get('/signup', [AuthController::class, 'register_view'])->name('signup');
Route::post('/signup', [AuthController::class, 'register'])->name('signup');

//Login
Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'Login'])->name('login');

Route::get('/signup', function () {
    return view('signup');
});

/* User Management */
Route::get('/user-management', [UserManagementController::class, 'index'])->name('user-management.index');
Route::get('/user-management/create', [UserManagementController::class, 'create'])->name('user-management.create');
Route::post('/user-management', [UserManagementController::class ,'store'])->name('user-management.store');
Route::get('/user-management/{id}/edit', [UserManagementController::class ,'edit'])->name('user-management.edit');
Route::put('/user-management/{id}', [UserManagementController::class ,'update'])->name('user-management.update');
Route::delete('/user-management/{id}', [UserManagementController::class ,'destroy'])->name('user-management.destroy');
Route::get('/user-management/trash', [UserManagementController::class,'trash'])->name('user-management.trash');
Route::get('/user-management/{id}/restore/', [UserManagementController::class,'restore'])->name('user-management.restore');


