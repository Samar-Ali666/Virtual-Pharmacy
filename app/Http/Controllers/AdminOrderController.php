<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->where('status', 0)->get();

        return view('admin.orders.current', compact('orders'));
    }

    public function showDetails($id)
    {
        $order = Order::findOrFail($id);

        return view('admin.orders.order_details', compact('order'));
    }

    public function changeOrderStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $input = $request->except(['_token', '_method']);
        
        if ($input['status'] == null) {
            alert()->warning('Select status!', 'please select an valid status');
            return redirect()->route('order.detail', $order->id);
        } else {
            $order->whereId($id)->update($input);
            alert()->success('Status changed!', 'order status has been changed successfully');
            return redirect()->route('order.detail', $order->id);
        }
    }

    public function shippedOrders()
    {
        $orders = Order::latest()->where('status', 1)->get();

        return view('admin.orders.shipped', compact('orders'));
    }

    public function completedOrders()
    {
        $orders = Order::latest()->where('status', 2)->get();

        return view('admin.orders.completed', compact('orders'));
    }
}
