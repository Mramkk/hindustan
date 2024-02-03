<?php

namespace App\Http\Controllers\Admin\Product;

use App\Helper\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImg;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminProductController extends Controller
{
    public function index()
    {
        // $category = Category::all();
        $brand = Brand::all();
        $unit = Unit::all();
        return view('admin.product.create', compact('brand', 'unit'));
    }

    public function product()
    {
        $products = Product::latest()->with('img')->get();
        return view('admin.product.product', compact('products'));
    }

    public function save(Request $req)
    {
        $req->validate([
            'title' => 'required|string|max:225',
            'regular_price' => 'required|numeric|not_in:0',
            'selling_price' => 'required|numeric|not_in:0',
            'unit' => 'required',
            'file1' => 'required|image|mimes:jpeg,jpg,png',
            // 'file2' => 'required|image|mimes:jpeg,jpg,png',
            // 'file3' => 'required|image|mimes:jpeg,jpg,png'
        ]);

        $pid =   uniqid();
        $product = new Product();
        $product->aid = auth()->user()->id;
        $product->pid = $pid;
        $product->title = $req->title;
        $product->slug = Str::slug($req->title);
        $product->short_description = $req->short_description;
        $product->long_description = $req->long_description;
        $product->regular_price = $req->regular_price;
        $product->selling_price = $req->selling_price;
        $product->discount = $req->discount;
        $product->category = $req->category;
        $product->brand = $req->brand;
        $product->unit = $req->unit;
        $product->status = $req->status;
        $status = $product->save();

        if ($status) {
            $path = 'public/product/images/';
            if ($req->hasFile('file1')) {
                $picName =  uniqid() . Str::slug($req->title) . ".webp";

                Image::make($req->file1->getRealPath())->resize('480', '360')->save($path . $picName);
                $img = new ProductImg();
                $img->aid = auth()->user()->id;
                $img->pid = $pid;
                $img->image_no = '1';
                $img->type = "md";
                $img->image = $path . $picName;
                $status =  $img->save();

                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file1->getRealPath())->resize('640', '480')->save($path . $picName);
                $img = new ProductImg();
                $img->aid = auth()->user()->id;
                $img->pid = $pid;
                $img->image_no = '1';
                $img->type = "lg";
                $img->image = $path . $picName;
                $status =  $img->save();
            }
            if ($req->hasFile('file2')) {
                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file2->getRealPath())->resize('480', '360')->save($path . $picName);
                $img = new ProductImg();
                $img->aid = auth()->user()->id;
                $img->pid = $pid;
                $img->image_no = '2';
                $img->type = "md";
                $img->image = $path . $picName;
                $status =  $img->save();

                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file2->getRealPath())->resize('640', '480')->save($path . $picName);
                $img = new ProductImg();
                $img->aid = auth()->user()->id;
                $img->pid = $pid;
                $img->image_no = '2';
                $img->type = "lg";
                $img->image = $path . $picName;
                $status =  $img->save();
            }
            if ($req->hasFile('file3')) {
                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file3->getRealPath())->resize('480', '360')->save($path . $picName);
                $img = new ProductImg();
                $img->aid = auth()->user()->id;
                $img->pid = $pid;
                $img->image_no = '3';
                $img->type = "md";
                $img->image = $path . $picName;
                $status =  $img->save();

                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file3->getRealPath())->resize('640', '480')->save($path . $picName);
                $img = new ProductImg();
                $img->aid = auth()->user()->id;
                $img->pid = $pid;
                $img->image_no = '3';
                $img->type = "lg";
                $img->image = $path . $picName;
                $status =  $img->save();
            }
            if ($status) {
                return ApiRes::success("Product Added Successfullly !");
            } else {
                return ApiRes::error();
            }
        } else {
            return ApiRes::error();
        }
    }

    function edit(Request $req)
    {
        $product = Product::Where('id', $req->id)->with('imgmd')->first();
        $category = Category::all();
        $brand = Brand::all();
        $unit = Unit::all();
        return view('admin.product.edit', compact('product', 'category', 'brand', 'unit'));
    }


    public function update(Request $req)
    {
        $product = Product::Where('id', $req->id)->first();

        $req->validate([
            'title' => 'required|string|max:225',
            'regular_price' => 'required|numeric|not_in:0',
            'selling_price' => 'required|numeric|not_in:0',
            'unit' => 'required'
        ]);

        $product->title = $req->title;
        $product->slug = Str::slug($req->title);
        $product->short_description = $req->short_description;
        $product->long_description = $req->long_description;
        $product->regular_price = $req->regular_price;
        $product->selling_price = $req->selling_price;
        $product->discount = $req->discount;
        $product->category = $req->category;
        $product->brand = $req->brand;
        $product->unit = $req->unit;
        $product->status = $req->status;
        $status = $product->update();

        if ($status) {
            $pid = Product::where('id', $req->id)->first()->pid;
            $path = 'public/product/images/';
            if ($req->hasFile('file1')) {
                $img = ProductImg::where('pid', $pid)->where('image_no', '1')->where('type', 'md')->first();
                unlink($img->image);

                // md image
                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file1->getRealPath())->resize('480', '360')->save($path . $picName);
                $img->aid = auth()->user()->id;
                $img->image = $path . $picName;
                $status =  $img->update();

                // lg image
                $img = ProductImg::where('pid', $pid)->where('image_no', '1')->where('type', 'lg')->first();
                unlink($img->image);
                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file1->getRealPath())->resize('640', '480')->save($path . $picName);
                $img->aid = auth()->user()->id;
                $img->image = $path . $picName;
                $status =  $img->update();
            }
            if ($req->hasFile('file2')) {
                $img = ProductImg::where('pid', $pid)->where('image_no', '1')->where('type', 'md')->first();
                unlink($img->image);

                // md image
                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file2->getRealPath())->resize('480', '360')->save($path . $picName);
                $img->aid = auth()->user()->id;
                $img->image = $path . $picName;
                $status =  $img->update();

                // lg image
                $img = ProductImg::where('pid', $pid)->where('image_no', '1')->where('type', 'lg')->first();
                unlink($img->image);
                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file2->getRealPath())->resize('640', '480')->save($path . $picName);
                $img->aid = auth()->user()->id;
                $img->image = $path . $picName;
                $status =  $img->update();
            }
            if ($req->hasFile('file3')) {
                $img = ProductImg::where('pid', $pid)->where('image_no', '1')->where('type', 'md')->first();
                unlink($img->image);

                // md image
                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file3->getRealPath())->resize('480', '360')->save($path . $picName);
                $img->aid = auth()->user()->id;
                $img->image = $path . $picName;
                $status =  $img->update();

                // lg image
                $img = ProductImg::where('pid', $pid)->where('image_no', '1')->where('type', 'lg')->first();
                unlink($img->image);
                $picName =  uniqid() . Str::slug($req->title) . ".webp";
                Image::make($req->file3->getRealPath())->resize('640', '480')->save($path . $picName);
                $img->aid = auth()->user()->id;
                $img->image = $path . $picName;
                $status =  $img->update();
            }
            if ($status) {
                return ApiRes::success("Product Updated Successfullly !");
            } else {
                return ApiRes::error();
            }
        } else {
            return ApiRes::error();
        }
    }


    public function status(Request $req)
    {
        $unit = Product::Where('id', $req->id)->first();
        if ($unit->status == '1') {
            $unit->status = '0';
            $status = $unit->update();
            if ($status) {
                return  ApiRes::success('Status Changed Successfully!');
            } else {
                return  ApiRes::error();
            }
        } else {
            $unit->status = '1';
            $status = $unit->update();
            if ($status) {
                return  ApiRes::success('Status Changed Successfully!');
            } else {
                return  ApiRes::error();
            }
        }
    }

    public function deleteProduct(Request $req)
    {
        $img = ProductImg::where('pid', $req->id)->where('image_no', '1')->where('type', 'md')->first();
        unlink('./' . $img->image);
        $img = ProductImg::where('pid', $req->id)->where('image_no', '1')->where('type', 'lg')->first();
        unlink('./' . $img->image);
        $img = ProductImg::where('pid', $req->id)->where('image_no', '2')->where('type', 'md')->first();
        unlink('./' . $img->image);
        $img = ProductImg::where('pid', $req->id)->where('image_no', '2')->where('type', 'lg')->first();
        unlink('./' . $img->image);
        $img = ProductImg::where('pid', $req->id)->where('image_no', '3')->where('type', 'md')->first();
        unlink('./' . $img->image);
        $img = ProductImg::where('pid', $req->id)->where('image_no', '3')->where('type', 'lg')->first();
        unlink('./' . $img->image);

        $status = ProductImg::where('pid', $req->id)->delete();
        $status = Product::Where('pid', $req->id)->first()->delete();

        if ($status) {
            return ApiRes::success("Product Deleted Successfullly !");
        } else {
            return ApiRes::error();
        }
    }
}
