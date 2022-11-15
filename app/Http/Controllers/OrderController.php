<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Supplier;
use App\Models\OrderItem;
use App\Models\StockItem;
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
    public function ViewOrder()
    {
        $orderData = Order::paginate(8);

        return view('users.employee.employeeOrder')->with(['orderData' => $orderData,]);
    }

    public function EditOrder($id)
    {
        $order = Order::find($id);
        return response()->json([
            'status' => 200,
            'order' => $order,
        ]);
    }

    public function UpdateOrder(Request $request)
    {
        // if (!empty($request->input('order_message'))) {
        //     dd('order_message is not empty.');
        // } else {
        //     dd('order_message is empty.');
        // }

        $order_id = $request->input('order_id');
        $order = Order::find($order_id);

        if ($request->input('order_message') == 'Completed') {
            $order->order_status = 1;
            $order->order_message = $request->input('order_message');
            $order->update();

            //for each order item, add to stock inventory
            $orderItems = OrderItem::where('order_id', $order_id)->get();
            foreach ($orderItems as $item) {
                Stock::create([
                    'user_id' => Auth::id(),
                    'product_id' => $item->product_id,
                    $product = Product::where('id', $item->product_id)->first(),
                    'stock_product' => $product->product_name,
                    'stock_image' => $product->product_image,
                    'stock_item_type' => $product->product_type,
                    'stock_item_category' => $product->product_category,
                    'purchase_price' => $item->order_item_price,
                    'stock_quantity' => $item->order_item_quantity,
                    'stock_location' => $order->order_location,
                    $supplier = Supplier::where('id', $item->supplier_id)->first(),
                    'stock_item_brand' => $supplier->supplier_name,
                    'stock_status' => 1,
                    'stock_message' => 'In-Stock',
                    'stock_item_barcode' => rand(00000000000, 99999999999),
                    'selling_price' => number_format(($item->order_item_price / (1 - 0.25)), 2),
                ]);
            }
        } else {
            $order->order_status = 0;
            $order->order_message = $request->input('order_message');
            $order->update();
        }

        return redirect()->back()->with('status', 'Order Updated Successfully');
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