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

    public function productView(Request $req) {
        $product = Product::Where('id', $req->id)->with('imgmd')->first();
        $related_products = Product::WhereNotIn('id', [$req->id])->Where('status', '1')->with('img')->take(3)->get();
        return view('web.product-details', compact('product', 'related_products'));
    }
}
