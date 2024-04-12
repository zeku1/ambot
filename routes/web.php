<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\DatabaseController;
use \App\Http\Controllers\DepartmentController;
use \App\Http\Controllers\DesignationController;
use \App\Http\Controllers\AssignDesignationController;
use App\Http\Controllers\DeductionsController;
use App\Http\Controllers\LeavesController;
use App\Http\Controllers\EarningsController;

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


Route::get('/', [DatabaseController::class, 'milestone2']);

Route::get('/milestone2', [DatabaseController::class, 'milestone2'])->name('milestone2');

Route::get('/create_department', [DatabaseController::class, 'index']);

Route::resource('employees', DatabaseController::class)
    ->only(['index', 'create' ,'store', 'edit' ,'update', 'destroy']);

Route::get('/employees/search', [DatabaseController::class, 'search'])->name('employees.search');

Route::resource('designations', DesignationController::class)
    ->only(['index', 'create' ,'store', 'edit' ,'update', 'destroy']);

Route::resource('departments', DesignationController::class)
    ->only(['index', 'create' ,'store', 'edit' ,'update', 'destroy']);

Route::get('/departments/designations', [DepartmentController::class, 'departmentsDesignations']);

Route::get('/search_results', [DatabaseController::class, 'search'])->name('search_results');

Route::resource('leaves', LeavesController::class)
    ->only(['index', 'create' ,'store', 'edit' ,'update']);

Route::delete('/leaves/{leave}', [LeavesController::class, 'destroy'])->name('leaves.destroy');

Route::resource('earnings', EarningsController::class)
    ->only(['index', 'create' ,'store', 'edit' ,'update']);

Route::delete('/earnings/{earnings}', [EarningsController::class, 'destroy'])->name('earnings.destroy');

Route::resource('deductions', DeductionsController::class)
    ->only(['index', 'create' ,'store', 'edit' ,'update']);

Route::delete('/deductions/{deductions}', [DeductionsController::class, 'destroy'])->name('deductions.destroy');