<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Employee;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Order($id)
    {
        $supplierData = Supplier::find($id);
        // dd($supplierData);
        $products = Product::where('supplier_id', $id)->get();
        // dd($products);
        $carts = Cart::where('user_id', Auth::id())->get();
        // dd($carts);

        return view('users.employee.employeeOrderProduct')->with(['supplierData' => $supplierData, 'products' => $products, 'carts' => $carts]);
    }

    public function PlaceOrder(Request $request)
    {
        $order = new Order();
        $user = User::where('id', Auth::id())->first();
        $manager = Employee::where('user_id', Auth::id())->first();

        $order->user_id = Auth::id();
        $order->order_name = $user['name'];
        $order->order_location = $manager['employee_job_location'];
        $order->order_quantity = $request->input('order_quantity');
        $order->order_total = $request->input('order_total');
        $order->tracking_no = 'poslaju' . rand(1111, 9999);
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'supplier_id' => $item->supplier_id,
                'order_item_quantity' => $item->cart_item_quantity,
                'order_item_price' => $item->cart_item_price,
            ]);
        }

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return  redirect()->back()->with('status', 'Order Placed Successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}