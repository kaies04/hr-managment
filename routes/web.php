<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrganizationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DepartmentController;

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
Route::resource('department', BranchController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
