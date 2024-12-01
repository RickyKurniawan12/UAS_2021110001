<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('orders.index', compact('orders'));
    }

    public function create()
    { 
        $totalOrders = Order::count(); // Hitung total orders
        return view('orders.create', compact('totalOrders'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
        'id' => 'required|unique:orders,id', 
        'name' => 'required|string|max:255',  
        'description' => 'nullable',
        'price' => 'required|numeric|min:0', 
        'total_order' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ]);
        $totalOrders = Order::count();
        $imagePath = null;
        if ($request->hasFile('product_image')) {
            $imagePath = $request->file('product_image')->store('product_images', 'public');

        Order::create(['id' => $request->id,
        'name' => $validated['name'],
        'description'=> $validated['description'],
        'price' => $validated['price'],
        'image'=> $imagePath,
        'total_orders' => $totalOrders + 1]);
        
        return redirect()->route('orders.index')->with('success', 'Order created successfully.');}
    }

    public function edit(Order $order)
    {
        return view('orders.edit', compact('order'));
    }

    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'id' => 'required|unique:orders,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            'price' => 'required|numeric|min:0',
            'total_order' => 'required|numeric',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $order->update($validated);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully.');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully.');
    }
}
