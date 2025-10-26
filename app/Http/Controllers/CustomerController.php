<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Customer;

class CustomerController extends Controller
{


    public function getAllCustomers() {

        $customerData = Cache::remember('customer_cache', 600, function() {
            return Customer::all();
        }

        );

        return $customerData;
    }

    public function showAllCustomers() {

        $customerData = $this->getAllCustomers();

        return view('home', compact('customerData'));
    }

    public function saveCustomerDetails (Request $request){
        $request ->validate([
            'custName' => 'required|string|max:45',
            'custAdd' => 'required|string|max:100'
        ]);


        Customer::create([
            'cust_name' => $request -> custName,
            "cust_address" => $request ->custAdd
        ]);

        Cache::forget('customer_cache');

        return redirect()->route('home');
    }
    public function deleteCustomerDetails($cust_id){
        //dd($cust_ID);

        $customer = Customer::findOrFail($cust_id);

        $customer->delete();

        Cache::forget('customer_cache');

        return redirect()->route('home');
    }

    public function ShowCustomerDetails($cust_id){
        $customerDetails = Customer::findOrFail($cust_id);

        return view('editCustomer', compact('customerDetails'));

    }
    public function saveEditCustomer(Request $request, $cust_id){
        $customerDetails = Customer::findOrFail($cust_id);

        $customerDetails ->cust_name = $request -> input('custName');
        $customerDetails ->cust_address = $request -> input('custAdd');
        $customerDetails ->save();

        return redirect()->route('home');
    }

}