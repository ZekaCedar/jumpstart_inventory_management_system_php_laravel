<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/home', function () {
    if (Auth::check()) {
        if (Auth::user()->role == 'employee') {
            return redirect()->route("employee#index");
        } else if (Auth::user()->role == 'customer') {
            return redirect()->route("customer#index");
        }
    }
})->name('auth.login');

//Employee
Route::group(['prefix' => 'employee'], function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employee#index'); //employee dashboard
    Route::get('/supplier', [SupplierController::class, 'SupplierIndex'])->name('employee#SupplierIndex');
    Route::post('/addSupplier', [SupplierController::class, 'CreateSupplier'])->name('supplier#CreateSupplier');
});

//Customer