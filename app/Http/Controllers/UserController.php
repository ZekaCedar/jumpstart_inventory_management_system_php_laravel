<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function viewCustomer()
    {
        $customerData = Customer::paginate(8);

        return view('users.employee.employeeListCustomer')->with(['customerData' => $customerData,]);
    }

    public function viewEmployee()
    {
        $employeeData = Employee::paginate(8);

        return view('users.employee.employeeListEmployee')->with(['employeeData' => $employeeData,]);
    }

    public function EditEmployee($id)
    {
        $employee = Employee::find($id);
        return response()->json([
            'status' => 200,
            'employee' => $employee,
        ]);
    }

    public function EditCustomer($id)
    {
        $customer = Customer::find($id);
        return response()->json([
            'status' => 200,
            'customer' => $customer,
        ]);
    }

    public function UpdateCustomer(Request $request)
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

        $customer_id = $request->input('customer_id');
        $customer = Customer::find($customer_id);
        $customer->customer_name = $request->input('customer_name');
        $customer->customer_email = $request->input('customer_email');
        $customer->customer_contact = $request->input('customer_contact');
        $customer->update();

        // return redirect()->route('employee#SupplierIndex');
        return redirect()->back()->with('status', 'Customer Updated Successfully');
    }

    public function DeleteCustomer($id)
    {
        $customer = Customer::where('id', $id)->first();
        $user_id = $customer['user_id'];
        User::where('id', $user_id)->delete();
        $customer->delete();

        return back()->with('status', 'Customer Deleted Successfully');
    }

    public function UpdateEmployee(Request $request)
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

        $employee_id = $request->input('employee_id');
        $employee = Employee::find($employee_id);
        $employee->employee_name = $request->input('employee_name');
        $employee->employee_email = $request->input('employee_email');
        $employee->employee_contact = $request->input('employee_contact');
        $employee->employee_job_title = $request->input('employee_job_title');
        $employee->employee_job_location = $request->input('employee_job_location');
        $employee->employee_job_description = $request->input('employee_job_description');
        $employee->update();

        // return redirect()->route('employee#SupplierIndex');
        return redirect()->back()->with('status', 'Employee Updated Successfully');
    }

    public function DeleteEmployee($id)
    {
        $employee = Employee::where('id', $id)->first();
        $user_id = $employee['user_id'];
        User::where('id', $user_id)->delete();
        $employee->delete();

        return back()->with('status', 'Employee Deleted Successfully');
    }
}