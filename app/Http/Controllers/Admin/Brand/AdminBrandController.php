<?php

namespace App\Http\Controllers\Admin\Brand;

use App\Helper\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminBrandController extends Controller
{
    private $path = 'public/imgs/brand/';
    public function index()
    {
        // $brand = Brand::all();
        return view('admin.brand.brand');
    }

    public function loadData()
    {
        $brands = Brand::all();
        return ApiRes::data('Brand Data', $brands);
    }

    public function save(Request $req)
    {
        $req->validate([
            'title' => 'required|string|unique:brands|max:225',
            'brand_image_file' => 'required|image|mimes:jpeg,jpg,webp,png|dimensions:min_width=400,min_height=400',
        ]);
        try {
            $brand = new Brand();
            $brand->title = $req->title;
            $brand->save();
            if ($req->hasFile('brand_image_file')) {
                $picName = Str::slug($req->title) . "-" . uniqid() . ".webp";
                Image::make($req->brand_image_file->getRealPath())->resize('400', '400')->save($this->path . $picName);
                $brand->img = $this->path . $picName;
                $brand->update();
            }
            // return redirect()->back()->with('success', 'Brand Added Successfully!');
            return ApiRes::success('Brand added successfully !');
        } catch (\Throwable $th) {
            return ApiRes::error($th->getMessage());
            //  return redirect()->back()->with('error', 'Something Error!' . $th->getMessage());
            // return redirect()->back()->with('error', 'Something Error!');
        }
    }

    public function status(Request $req)
    {
        $brand = Brand::Where('id', $req->id)->first();
        if ($brand->status == '1') {
            $brand->status = '0';
            $status = $brand->update();
            if ($status) {
                return  ApiRes::success('Status Changed Successfully!');
            } else {
                return  ApiRes::error();
            }
        } else {
            $brand->status = '1';
            $status = $brand->update();
            if ($status) {
                return  ApiRes::success('Status Changed Successfully!');
            } else {
                return  ApiRes::error();
            }
        }
    }

    public function deleteBrand(Request $req)
    {
        $brand = Brand::Where('id', $req->id)->first();
        if ($brand->img != null) {
            File::delete($brand->img);
        }
        $status = $brand->delete();
        if ($status) {
            return  ApiRes::success('Brand Deleted Successfully!');
        } else {
            return  ApiRes::error();
        }
    }
}
