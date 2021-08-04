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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/employees', 'App\Http\Controllers\EmployeeController@index');
Route::get('/projects', 'App\Http\Controllers\ProjectController@index');
Route::get('/employee/{id}', 'App\Http\Controllers\EmployeeController@show');
Route::get('/project/{id}', 'App\Http\Controllers\ProjectController@show');


Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
Route::put('/employee/{id}', [EmployeeController::class, 'update'])->name('employees.update');

Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::delete('/projects/{id}', [ProjectController::class, 'destroy'])->name('projects.destroy');






