<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\isNull;

class ProductController extends Controller
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
    public function CreateProduct(Request $request)
    {
        $product = new Product();
        if ($request->hasfile('product_image')) {
            $imageFile = $request->file('product_image');
            $imageName = uniqid() . '_' . $imageFile->getClientOriginalName();
            // $imageFile->move(public_path() . './uploads/products', $imageName);
            $imageFile->move(public_path('uploads/products'), $imageName);
            $product->product_image = $imageName;
        }

        $product->product_name = $request->input('product_name');
        $product->product_price = $request->input('product_price');
        $product->product_type = $request->input('product_type');
        $product->product_category = $request->input('product_category');
        $product->product_supplier = $request->input('product_supplier');

        $supplier = Supplier::where('supplier_name', $request->input('product_supplier'))->first();

        $product->supplier_id = $supplier->id;
        $product->manager_id = $request->input('manager_id');
        $product->save();

        return  redirect()->back()->with('status', 'Product Added Successfully');
    }

    public function EditProduct($id)
    {
        $product = Product::find($id);
        return response()->json([
            'status' => 200,
            'product' => $product,
        ]);
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::find($product_id);
        $product->product_name = $request->input('product_name');
        $product->product_supplier = $request->input('product_supplier');
        $product->product_price = $request->input('product_price');
        $product->product_type = $request->input('product_type');
        $product->product_category = $request->input('product_category');

        if ($request->hasfile('product_image')) {
            $updateImage = $product['product_image'];

            if (File::exists(public_path() . '/uploads/products/' . $updateImage)) {
                File::delete(public_path() . '/uploads/products/' . $updateImage);
            }
            $imageFile = $request->file('product_image');
            $imageName = uniqid() . '_' . $imageFile->getClientOriginalName();
            $imageFile->move(public_path() . './uploads/products', $imageName);
            $product->product_image = $imageName;
        } else {
            $product->product_image = $request->input('product_image');
        }

        $supplier = Supplier::where('supplier_name', $request->input('product_supplier'))->first();

        $product->supplier_id = $supplier->id;
        $product->manager_id = $request->input('manager_id');
        $product->update();

        // return redirect()->route('employee#SupplierIndex');
        return redirect()->back()->with('status', 'Product Updated Successfully');
    }

    public function DeleteProduct($id)
    {
        $deleteData = Product::select('product_image')->where('id', $id)->first();
        $deleteImage = $deleteData['product_image'];

        Product::where('id', $id)->delete();

        if (File::exists(public_path() . '/uploads/products/' . $deleteImage)) {
            File::delete(public_path() . '/uploads/products/' . $deleteImage);
        }

        return back()->with('status', 'Product Deleted Successfully');
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