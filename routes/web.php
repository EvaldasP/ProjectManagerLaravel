<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProjectController;
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


Route::get('/employees', [EmployeeController::class, 'index']);
Route::get('/', [EmployeeController::class, 'index']);
Route::post('/employees', [EmployeeController::class, 'store']);
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employee.destroy');
Route::get('/employees/{id}', [EmployeeController::class, 'show'])->name('employee.show');
Route::PUT('/employees/{id}', [EmployeeController::class, 'update'])->name('employee.update');

Route::get('/projects', [ProjectController::class, 'index']);
Route::post('/projects', [ProjectController::class, 'store']);
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');
Route::get('/projects/{id}', [ProjectController::class, 'show'])->name('project.show');
Route::PUT('/projects/{id}', [ProjectController::class, 'update'])->name('project.update');
