<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\returnSelf;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'productImage' => 'required',
        ]);

        $imagePath = $request->file('productImage')->store('products','public');

        Product::create([
            'name'        => $request->name,
            'price'       => $request->price,
            'profil_photo'=> $imagePath
        ]);
        return redirect()->back()->with('success', 'تمت إضافة المنتج بنجاح!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required',
        ]);
        $product = Product::findOrFail($request->id);

        if (isset($request->productImage)) {
            Storage::disk('public')->delete($product->profil_photo);
            $imagePath = $request->file('productImage')->store('products','public');
            $product->update([
                'name'   => $request->name,
                'price'  => $request->price,
                'profil_photo'=> $imagePath
            ]);

        }else{
            $product->update([
                'name'   => $request->name,
                'price'  => $request->price
            ]);
        }

        return redirect()->back()->with('success', 'تمت تعديل المنتج بنجاح!');
    }

    public function destroy(Request $request)
    {
        $product = Product::findOrFail($request->id);
        Storage::disk('public')->delete($product->profil_photo);
        
        $product->delete();

        return redirect()->back()->with('success', 'تمت حذف المنتج بنجاح!');

    }
}
