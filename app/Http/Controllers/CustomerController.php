<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        return Customer::all();
    }

    public function store(Request $request)
    {
        $customerExists = Customer::where('email', $request->input('email'))->get();
//        dd($customerExists);
        if(!$customerExists->count() > 0){
            $customer = Customer::create($request->all());
            return response()->json([$customer]);
        }
        return response()->json(["status" => "false", "message" => "email already in use"], 403);

    }

    public function show($id)
    {
        return Customer::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->all());
        return $customer;
    }

    public function destroy($id)
    {
        $customer = Order::findOrFail($id);
        $result = $customer->delete();
        return response()->json($customer, $result ? 204 : 404);
    }
}
