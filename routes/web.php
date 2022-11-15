<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
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

//Supplier Edit 
Route::get('editSupplier/{id}', [SupplierController::class, 'EditSupplier']);
// Route::put('updateSupplier', [SupplierController::class, 'UpdateSupplier']);

//Product Edit
Route::get('editProduct/{id}', [ProductController::class, 'EditProduct']);

//Cart
// Route::get('decrease-quantity/{id}', [CartController::class, 'DecreaseQuantity']);
// Route::get('increase-quantity/{id}', [CartController::class, 'IncreaseQuantity']);

//Order
Route::get('editOrder/{id}', [OrderController::class, 'EditOrder']);

//Employee
Route::group(['prefix' => 'employee'], function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employee#index'); //employee dashboard
    Route::get('/supplier', [SupplierController::class, 'SupplierIndex'])->name('employee#SupplierIndex');
    Route::post('/addSupplier', [SupplierController::class, 'CreateSupplier'])->name('supplier#CreateSupplier');
    Route::put('/updateSupplier', [SupplierController::class, 'UpdateSupplier'])->name('supplier#UpdateSupplier');
    Route::get('/deleteSupplier/{id}', [SupplierController::class, 'DeleteSupplier'])->name('supplier#DeleteSupplier');
    Route::post('/addProduct', [ProductController::class, 'CreateProduct'])->name('product#CreateProduct');
    Route::put('/updateProduct', [ProductController::class, 'UpdateProduct'])->name('product#UpdateProduct');
    Route::get('/deleteProduct/{id}', [ProductController::class, 'DeleteProduct'])->name('product#DeleteProduct');
    Route::post('/add-to-cart', [CartController::class, 'AddToCart'])->name('cart#AddToCart');
    Route::get('decrease-quantity/{id}', [CartController::class, 'DecreaseQuantity'])->name('cart#DecreaseQuantity');
    Route::get('increase-quantity/{id}', [CartController::class, 'IncreaseQuantity'])->name('cart#IncreaseQuantity');
    Route::get('/delete-cart-item/{id}', [CartController::class, 'DeleteCartItem'])->name('cart#DeleteCartItem');
    Route::get('/order/{id}', [OrderController::class, 'Order'])->name('order#Order');
    Route::post('/place-order', [OrderController::class, 'PlaceOrder'])->name('order#PlaceOrder');
    Route::get('/view-order', [OrderController::class, 'ViewOrder'])->name('order#ViewController');
    Route::put('/updateOrder', [OrderController::class, 'UpdateOrder'])->name('order#UpdateOrder');
    Route::get('/stock', [StockController::class, 'StockIndex'])->name('stock#StockIndex');
    Route::get('/stock-product', [StockController::class, 'StockProduct'])->name('stock#StockProduct');
});

//Customer