<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function view(){
        $cart = session()->get('cart', []);
        $items = [];
        foreach ($cart as $value)
        {
            $item = Product::where("id",$value['product_id'])->first();
            $items[] = [
                'name'    => $item->name,
                'price'   => $item->price,
                'quantity'=> $value['quantity'],
                'id'      => $value['product_id']
            ];
        }
        return view('cart.view',compact('items'));
    }

    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $productId = $request->id;

        if(isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            $cart[$productId] = [
                "product_id" => $request->id,
                "quantity" => 1,
            ];
        }

        session()->put('cart', $cart);

        return response()->json(['message' => 'تمت الإضافة بنجاح!', 'cart' => $cart]);

    }

    public function count()
    {
        $cart = session()->get('cart', []);
        $count = 0;
        foreach ($cart as $item) {
            $count += $item['quantity'];
        }

        return response()->json(['count' => $count]);
    }

    public function removeFromCart($id) {
        $cart = session()->get('cart', []);
        $productId = $id;

        if(isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        return to_route('cart.view')->with('success', 'تمت حذف المنتج بنجاح!');
    }

    public function clear()
    {
        session()->forget('cart');
        return view('cart.view')->with('success', 'تمت إفراغ السلة بنجاح!');
    }

    public function info()
    {
        return view('cart.info');
    }

}
