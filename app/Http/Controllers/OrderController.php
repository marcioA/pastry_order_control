<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Envelope;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all();
    }

    public function store(Request $request)
    {
        $data = array();

        $customer = Customer::find($request->input('customer_id'));

        $order = Order::create($request->all());
        if($order){
            $emailSender = new Envelope(
                from: new Address('pastel@pasteljao.com', 'Pedido Pastelaria'),
                to: new Address($customer['email'], $customer['name']),
                subject: 'Order Shipped #'.$order->id,
            );
            $data['status'] = true;
            $data['email'] = $emailSender;
        }

        return response()->json([$data]);
    }

    public function show($id)
    {
        return Order::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->all());
        return $order;
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $result = $order->delete();
        return response()->json($order, $result ? 204 : 404);
    }
}
