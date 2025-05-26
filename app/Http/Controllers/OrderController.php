<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $invoices = Order::all();
        return view('order.index',compact('invoices'));
    }

    public function store(StoreOrderRequest $request)
    {
        $cart = session()->get('cart', []);

        $total = 0;
        foreach ($cart as $item)
        {
            $total += $item['quantity'] *
                      Product::where('id',$item['product_id'])->first()->price;
        }
      //  $total += 3000;

        $order = Order::create([
            'name'   => $request->name,
            'address'=> $request->address,
            'phone'  => $request->phone,
            'amount' => $total,
        ]);

        foreach ($cart as $item)
        {
            OrderItem::create([
                'order_id'   => $order->id,
                'product_id' => $item['product_id'],
                'quantity'   => $item['quantity'],
            ]);
        }

        session()->forget('cart');

        return to_route('home')->with('success', 'تمت إضافة الفاتورة بنجاح!');
    }

    public function show($id)
    {
        $orders = OrderItem::where('order_id',$id)->get();
        return view('order.show',compact('orders'));
    }

    public function update(Request $request)
    {
        $order = OrderItem::findOrFail($request->id);

        $order->update([ 'quantity' => $request->quantity ]);

        return to_route('order.show',['id' => $request->order_id])->with('success', 'تمت تعديل الطلب بنجاح!');


    }

    public function destroyItem(Request $request)
    {
        $order = OrderItem::where('id',$request->id)->delete();
        return to_route('order.show',['id' => $request->order_id])->with('success', 'تمت حذف الطلب بنجاح!');
    }
    public function destroy(Request $request)
    {
        $order = Order::where('id',$request->id)->delete();
        return to_route('orders.index')->with('success', 'تمت حذف الفاتورة بنجاح!');
    }

}
