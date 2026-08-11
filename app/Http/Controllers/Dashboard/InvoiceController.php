<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

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

    public function show(Order $order)
    {
        $order->load('user', 'items.product');

        return view('dashboard.invoices.show', compact('order'));
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
