<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\SupplierController;
use App\Models\SaleItem;

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
Route::get('editQuantity/{id}', [CartController::class, 'EditQuantity']);
// Route::get('decrease-quantity/{id}', [CartController::class, 'DecreaseQuantity']);
// Route::get('increase-quantity/{id}', [CartController::class, 'IncreaseQuantity']);

//Order
Route::get('editOrder/{id}', [OrderController::class, 'EditOrder']);

//Customer
Route::get('editCustomer/{id}', [UserController::class, 'EditCustomer']);
Route::get('editEmployee/{id}', [UserController::class, 'EditEmployee']);
Route::get('/payment-success', [SaleController::class, 'ShowSuccessPage']);
Route::get('generate-receipt/{id}', [SaleController::class, 'Receipt']);



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
    Route::get('/all-employee', [UserController::class, 'ViewEmployee'])->name('user#ViewEmployee');
    Route::get('/all-customer', [UserController::class, 'ViewCustomer'])->name('user#ViewCustomer');
    Route::put('/updateCustomer', [UserController::class, 'UpdateCustomer'])->name('user#UpdateCustomer');
    Route::get('/deleteCustomer/{id}', [UserController::class, 'DeleteCustomer'])->name('user#DeleteCustomer');
    Route::put('/updateEmployee', [UserController::class, 'UpdateEmployee'])->name('user#UpdateEmployee');
    Route::get('/deleteEmployee/{id}', [UserController::class, 'DeleteEmployee'])->name('user#DeleteEmployee');
    Route::get('/employee-sales', [SaleController::class, 'SalesIndex'])->name('sale#SalesIndex');
    Route::get('/view-invoice/{id}', [OrderController::class, 'ViewInvoice'])->name('order#ViewInvoice');
    Route::get('/invoice/{id}', [OrderController::class, 'invoice'])->name('order#invoice');
});

//Customer
Route::group(['prefix' => 'customer'], function () {
    Route::get('/', [CustomerController::class, 'index'])->name('customer#index'); //customer dashboard
    Route::post('/place-order-with-stripe', [SaleController::class, 'StoreSale'])->name('sale#StoreSale');
});