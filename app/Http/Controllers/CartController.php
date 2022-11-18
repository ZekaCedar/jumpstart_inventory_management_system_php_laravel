<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function DecreaseQuantity($id)
    {
        $cart = Cart::find($id);
        $updateQuantity = $cart['cart_item_quantity'];

        if ($updateQuantity != 0) {
            $updateQuantity--;
        }
        $cart->cart_item_quantity = $updateQuantity;
        $cart->update();

        return back();

        // $prod_id = $request->input('prod_id');
        // $prod_qty = $request->input('prod_qty');

        // if (Auth::check()) {
        //     if (Cart::where('product_id', $prod_id)->where('user_id', Auth::id())->exist()) {
        //         $cart = Cart::where('product_id', $prod_id)->where('user_id', Auth::id())->first();
        //         $cart->cart_item_quantity = $prod_qty;
        //         $cart->update();
        //         return response()->json(['status' => "Quantity updated"]);
        //     }
        // }
    }

    public function IncreaseQuantity($id)
    {
        $cart = Cart::find($id);
        $updateQuantity = $cart['cart_item_quantity'];

        if ($updateQuantity >= 0 && (Auth::user()->role == 'employee')) {
            $updateQuantity++;
            $cart->cart_item_quantity = $updateQuantity;
            $cart->update();
            return back();
        } else {
            $product_id = $cart['product_id'];
            $stock = Stock::where('product_id', $product_id)->first();
            $max_qty = $stock['stock_quantity'];
            if ($updateQuantity >= 0 && $updateQuantity < $max_qty) {
                $updateQuantity++;
                $cart->cart_item_quantity = $updateQuantity;
                $cart->update();
                return back();
            } else {
                return back()->with('status', 'you have reached maximum item quantity');
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function AddToCart(Request $request)
    {
        $cart = new Cart();
        $cart->cart_item_name = $request->input('cart_item_name');
        $cart->cart_item_price = $request->input('cart_item_price');
        $cart->cart_item_quantity = 1;
        $cart->product_id = $request->input('product_id');
        $cart->supplier_id = $request->input('supplier_id');
        $cart->user_id = $request->input('user_id');
        $cart->save();

        return  redirect()->back()->with('status', 'Product Added To Cart Successfully');
    }

    public function DeleteCartItem($id)
    {

        Cart::where('id', $id)->delete();

        return back()->with('status', 'Cart Item Deleted Successfully');
    }

    public function EditQuantity($id)
    {
        $cart = Cart::find($id);
        return response()->json([
            'status' => 200,
            'cart' => $cart,
        ]);
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