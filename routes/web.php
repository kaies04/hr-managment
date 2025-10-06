<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\DepartmentController;

use Illuminate\Support\Facades\Auth;



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

Route::resource('organization', OrganizationController::class);
Route::resource('department', DepartmentController::class);
Route::resource('branch', BranchController::class);

 Route::resource('companies', CompanyController::class);
// Designation CRUD routes
Route::resource('designations', DesignationController::class);

// Employee Salary CRUD routes
Route::resource('employee-salaries', EmployeeSalaryController::class);

// Employee CRUD routes
Route::resource('employees', EmployeeController::class);

// Shift CRUD routes
Route::resource('shifts', ShiftController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
