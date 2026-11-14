<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InvoiceController extends Controller
{
    public function index()
    {
        return redirect()->route('orders.index');
    }

    public function create()
    {
        return redirect()->route('orders.index');
    }

    public function store(Request $request)
    {
        return redirect()->route('orders.index');
    }

    public function show($invoice)
    {
        $invoiceId = Str::afterLast($invoice, '-') * 1;
        $order = Order::where('id', $invoiceId)->firstOrFail();
        $title = 'Invoice of |' . $order->order_number;
        return view('dashboard.invoice.show', compact('order', 'title'));
    }

    public function edit(Order $order)
    {
        return redirect()->route('orders.invoice', $order);
    }

    public function update(Request $request, Order $order)
    {
        return redirect()->route('orders.invoice', $order);
    }

    public function destroy(Order $order)
    {
        return redirect()->route('orders.index');
    }
}
