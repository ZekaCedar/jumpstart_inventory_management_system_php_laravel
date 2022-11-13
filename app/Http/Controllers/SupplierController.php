<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function SupplierIndex()
    {
        $supplierData = Supplier::paginate(5);
        $productData = Product::paginate(5);

        return view('users.employee.employeeSupplier')->with(['supplierData' => $supplierData, 'productData' => $productData]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function CreateSupplier(Request $request)
    {
        $supplier = new Supplier();
        $supplier->supplier_name = $request->input('supplier_name');
        $supplier->supplier_service = $request->input('supplier_service');
        $supplier->save();

        return  redirect()->back()->with('status', 'Supplier Added Successfully');
    }

    public function EditSupplier($id)
    {
        $supplier = Supplier::find($id);
        return response()->json([
            'status' => 200,
            'supplier' => $supplier,
        ]);
    }

    public function UpdateSupplier(Request $request)
    {
        // if (!empty($request->input('supplier_id'))) {
        //     dd('supplier_id is not empty.');
        // } else {
        //     dd('supplier_id is empty.');
        // }

        // if (!empty($request->input('supplier_name'))) {
        //     dd('supplier_name is not empty.');
        // } else {
        //     dd('supplier_name is empty.');
        // }

        // if (!empty($request->input('supplier_service'))) {
        //     dd('supplier_service is not empty.');
        // } else {
        //     dd('supplier_service is empty.');
        // }

        $supplier_id = $request->input('supplier_id');
        $supplier = Supplier::find($supplier_id);
        $supplier->supplier_name = $request->input('supplier_name');
        $supplier->supplier_service = $request->input('supplier_service');
        $supplier->update();

        // return redirect()->route('employee#SupplierIndex');
        return redirect()->back()->with('status', 'Supplier Updated Successfully');
    }

    public function DeleteSupplier($id)
    {
        Supplier::where('id', $id)->delete();
        return back()->with('status', 'Supplier Deleted Successfully');
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