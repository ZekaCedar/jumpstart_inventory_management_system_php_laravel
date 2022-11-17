<?php

namespace App\Http\Controllers;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\Cart;
use App\Models\Sale;
use App\Models\Stock;
use App\Models\Product;
use App\Models\Employee;
use App\Models\SaleItem;

use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class SaleController extends Controller
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
    public function storeSale(Request $request)
    {

        if (isset($_POST['stipe_payment_btn'])) {

            $cookie_data = stripslashes(Cookie::get('cart'));
            // dd($cookie_data);
            $cart_data = json_decode($cookie_data, true);
            // dd($cart_data);
            $items_in_cart = $cart_data;
            // dd($items_in_cart);

            $total = "0";
            foreach ($items_in_cart as $itemdata) {
                $products = Stock::where('product_id', $itemdata['product_id'])->first();
                // dd($products);
                $price_value = $products->selling_price;
                // dd($price_value);
                $total = $total + ($itemdata['cart_item_quantity'] * $price_value) + 8;
                // dd($total);
            }

            $stripetoken = $request->input('stripeToken');
            // dd($stripetoken);

            $STRIPE_SECRET = "sk_test_51LsLglLjHdZtO1depJWbxUvEdhO8EsK7S43lPnDqQvsZVVveRoQ3HLL0sOxhVq6npfeev2nBzVte86K8y1jSYpvl00AhchuqfT";
            Stripe::setApiKey($STRIPE_SECRET);

            \Stripe\Charge::create([
                'amount' => $total * 100,
                'currency' => 'usd',
                'description' => "Thank you for purchasing with JumpStart",
                'source' => $stripetoken,
                'shipping' => [
                    'name' => Auth::user()->name,
                    'phone' => Auth::user()->contact,
                    'address' => [
                        'line1' => "Address 1",
                        'line2' => "Address 2",
                        'postal_code' => "Zipcode",
                        'city' => "Kuala Lumpur",
                        'state' => "Selangor",
                        'country' => 'Malaysia',
                    ],
                ],
            ]);

            // update remaining stock quantity
            $total_quantity = 0;
            foreach ($items_in_cart as $itemdata) {
                $products = Stock::where('product_id', $itemdata['product_id'])->first();
                // dd($products);
                $item_stock_qty = $products['stock_quantity'];
                $item_sold_location = $products['stock_location'];
                $total_quantity += $itemdata['cart_item_quantity'];

                if ($item_stock_qty == 0) {
                    $products['stock_status'] = 0;
                    $products['stock_message'] = 'Out Of Stock';
                    $products->update();
                } else {
                    $remaining_qty = $item_stock_qty - $itemdata['cart_item_quantity'];
                    $products['stock_quantity'] = $remaining_qty;
                    $products->update();
                }
            }

            //add total sales to Sale Model
            $sale = new Sale();
            $manager = Employee::where('employee_job_location', $item_sold_location)->first();
            $sale->manager_id = $manager->id; // Employee id
            $sale->customer_id = Auth::id();
            $sale->sales_total = $total;
            $sale->sales_product_quantity = $total_quantity;
            $sale->sales_location = $item_sold_location;
            $sale->sales_manager = $manager->employee_name;
            $sale->save();

            //add Sales Item
            foreach ($items_in_cart as $itemdata) {
                SaleItem::create([
                    'sales_id' => $sale->id,
                    'product_id' => $itemdata['product_id'],
                    'supplier_id' => $itemdata['supplier_id'],
                    'sales_item_name' => $itemdata['cart_item_name'],
                    'sales_item_price' => $itemdata['cart_item_price'],
                    'sales_item_quantity' => $itemdata['cart_item_quantity'],
                ]);
            }

            //destroy cart
            $cartItems = Cart::where('user_id', Auth::id())->get();
            Cart::destroy($cartItems);

            // destroy or forget cookie
            Cookie::queue(Cookie::forget('cart'));

            return redirect('/payment-success')->with('status', 'Payment Transaction Successfull');
        }
    }

    public function ShowSuccessPage()
    {
        $salesData = Sale::where('customer_id', Auth::id())->orderBy('created_at', 'desc')->first();
        // dd($salesData);
        $salesItemData = SaleItem::where('sales_id', $salesData->id)->get();
        // dd($salesItemData);

        return view('users.customer.customerPaymentSuccess')->with(['salesData' => $salesData, 'salesItemData' => $salesItemData]);
    }

    public function Receipt($id)
    {
        if (Sale::where('id', $id)->exists()) {
            $salesData = Sale::find($id);
            //dd($salesData);
            $salesItemData = SaleItem::where('sales_id', $salesData->id)->get();
            // dd($salesItemData);

            // $data = [
            //     'salesData' => $salesData,
            //     'salesItemData' => $salesItemData,
            //     'description' => 'This description of Funda of Web IT'
            // ];
            $pdf = PDF::loadView('users.customer.customerPurchaseReceipt', ['salesData' => $salesData, 'salesItemData' => $salesItemData]);

            return $pdf->download('jumpstart.pdf');
        } else {
            return redirect()->back()->with('status', 'No transaction Found');
        }

        // return view('users.customer.customerPurchaseReceipt')->with(['salesData' => $salesData, 'salesItemData' => $salesItemData]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function SalesIndex()
    {
        $salesData = Sale::paginate(8);

        return view('users.employee.employeeSales')->with('salesData', $salesData);
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