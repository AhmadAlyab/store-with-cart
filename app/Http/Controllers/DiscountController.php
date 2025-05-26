<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'value'  => 'required|numeric|min:1|max:100',
        ]);


        Discount::create([
            'value' => $request->value,
            'product_id' => $request->id
        ]);

        return redirect()->back()->with('success', 'تمت إضافة الخصم بنجاح!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'value'  => 'required|numeric|min:1|max:100',
        ]);
        $product = Discount::findOrFail($request->id);

        $product->update([
            'value'   => $request->value,
        ]);

        return redirect()->back()->with('success', 'تمت تعديل الخصم بنجاح!');
    }

    public function destroy(Request $request)
    {
        $product = Discount::findOrFail($request->id)->delete();
        return redirect()->back()->with('success', 'تمت حذف الخصم بنجاح!');

    }
}
