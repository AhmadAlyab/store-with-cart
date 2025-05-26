<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $data['products'] = Product::with('discount')->get();


        return view('admin',$data);
    }
}
