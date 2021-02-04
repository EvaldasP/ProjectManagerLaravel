<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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


Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');
Route::get('/', [EmployeeController::class, 'index'])->name('home');
Route::post('/employees', [EmployeeController::class, 'store']);
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy')->middleware('auth');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employee.show')->middleware('auth');
Route::PUT('/employees/{id}', [EmployeeController::class, 'update'])->name('employee.update')->middleware('auth');

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');
Route::post('/projects', [ProjectController::class, 'store']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('project.destroy')->middleware('auth');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('project.show')->middleware('auth');
Route::PUT('/projects/{id}', [ProjectController::class, 'update'])->name('project.update')->middleware('auth');


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login');


Route::get('/logout', [LogoutController::class, 'store'])->name('logout');
