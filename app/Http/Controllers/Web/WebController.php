<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function home()
    {
        $products = Product::Where('status', '1')->with('img')->get();
        return view('web.home', compact('products'));
    }

    public function productView() {
        return view('web.product-details');
    }
}
