<?php

use App\Http\Controllers\EmployeeController as ControllersEmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\Employee;

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
    return view('welcome');
});
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
// This is to create view, which take function from controller as below Superadmin
Route::post('/add-trainer', [TrainerController::class, 'store'])->name('add-trainer.store');
Route::get('/add-trainer', [TrainerController::class, 'create'])->name('add-trainer.create');
// This is Admin
Route::post('/add-employee', [EmployeeController::class, 'store'])->name('add-employee.store');
Route::get('/add-employee', [EmployeeController::class, 'create'])->name('add-employee.create');
// This for Superadmin to view, edit, delete
Route::get('/manage-trainer', [TrainerController::class, 'index'])->name('manage-trainer.index');
Route::get('/trainers/{trainer}/edit', [TrainerController::class, 'edit'])->name('trainers.edit');
Route::put('/trainers/{trainer}', [TrainerController::class, 'update'])->name('trainers.update');
Route::delete('/trainers/{trainer}', [TrainerController::class, 'destroy'])->name('trainers.destroy');
// This for Admin to view, edit, delete
Route::get('/manage-employee', [EmployeeController::class, 'index'])->name('manage-employee.index');
Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('superadmin', function(){
    return view('superadmin');
})->name('superadmin') -> middleware('superadmin');

Route::get('admin', function(){
    return view('admin');
})->name('admin') -> middleware('admin');

Route::get('employee', function(){
    return view('employee');
})->name('employee') -> middleware('employee');
