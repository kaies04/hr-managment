<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeSalaryController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\DepartmentController;
// use App\Http\Controllers\AttendanceController;
// use App\Http\Controllers\LeaveController;
// use App\Http\Controllers\PayrollController;
// use App\Http\Controllers\ProvidentFundController;
// use App\Http\Controllers\LoanController;
// use App\Http\Controllers\BonusController;
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



Auth::routes();

Route::middleware('auth:web')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    });
    Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard');
    Route::resource('organization', OrganizationController::class);
    Route::resource('department', DepartmentController::class);
    Route::resource('branch', BranchController::class);

    Route::resource('company', CompanyController::class);
    // Designation CRUD routes
    Route::resource('designation', DesignationController::class);

    // Employee Salary CRUD routes
    Route::resource('employee-salaries', EmployeeSalaryController::class);

    // Employee CRUD routes
    Route::resource('employee', EmployeeController::class);

    // Shift CRUD routes
    Route::resource('shift', ShiftController::class);



    //  // Attendance CRUD routes
    // Route::resource('attendances', AttendanceController::class);

    // // Leave CRUD routes
    // Route::resource('leaves', LeaveController::class);

    // // Payroll CRUD routes
    // Route::resource('payrolls', PayrollController::class);

    // // Provident Fund CRUD routes
    // Route::resource('provident-funds', ProvidentFundController::class);

    // // Loan CRUD routes
    // Route::resource('loans', LoanController::class);

    // // Bonus CRUD routes
    // Route::resource('bonuses', BonusController::class);


});
