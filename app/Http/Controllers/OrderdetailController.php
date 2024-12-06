<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;

class OrderdetailController extends Controller
{
    public function create()
    {
        $menus = Menu::all();
        return view('orders.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string',
            'menus' => 'required|array',
            'menus.*.id' => 'required|exists:menus,id',
            'menus.*.quantity' => 'required|integer|min:1',
        ]);

        $totalPrice = 0;
        $orderDetails = [];

        foreach ($request->menus as $menuData) {
            $menu = Menu::findOrFail($menuData['id']);
            $subtotal = $menu->price * $menuData['quantity'];
            $totalPrice += $subtotal;

            $orderDetails[] = [
                'menu_id' => $menu->id,
                'quantity' => $menuData['quantity'],
                'subtotal' => $subtotal,
            ];
        }

        $order = Order::create([
            'customer_name' => $request->customer_name,
            'total_price' => $totalPrice,
        ]);

        $order->orderDetails()->createMany($orderDetails);

        return redirect()->route('orders.create')->with('success', 'Pesanan berhasil dibuat!');
    }
}
