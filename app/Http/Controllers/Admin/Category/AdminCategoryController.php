<?php

namespace App\Http\Controllers\Admin\Category;

use App\Helper\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;


class AdminCategoryController extends Controller
{
    private $path = 'public/imgs/category/';
    public function index()
    {
        // $category = Category::all();
        // return view('admin.category.category', compact('category'));
        return view('admin.category.category');
    }

    public function loadData()
    {
        $categories = Category::all();
        return ApiRes::data('Category Data', $categories);
    }

    public function save(Request $req)
    {
        $req->validate([
            'title' => 'required|string|unique:categories|max:225',
            'category_image_file' => 'required|image|mimes:jpeg,jpg,webp,png|dimensions:min_width=400,min_height=400',
        ]);

        try {
            $category = new Category();
            $category->title = $req->title;
            $status = $category->save();

            if ($req->hasFile('category_image_file')) {
                $picName = Str::slug($req->title) . "-" . uniqid() . ".webp";
                Image::make($req->category_image_file->getRealPath())->resize('400', '400')->save($this->path . $picName);
                $category->img = $this->path . $picName;
                $status = $category->update();
            }
            // return redirect()->back()->with('success', 'Category added successfully !');
            return ApiRes::success('Category added successfully !');
        } catch (\Throwable $th) {
            return ApiRes::error($th->getMessage());
            //  return redirect()->back()->with('error', 'Something Error!' . $th->getMessage());
            // return redirect()->back()->with('error', 'Something Error!');
        }
    }

    public function status(Request $req)
    {
        $category = Category::Where('id', $req->id)->first();
        if ($category->status == '1') {
            $category->status = '0';
            $status = $category->update();
            if ($status) {
                return  ApiRes::success('Status Changed Successfully!');
            } else {
                return  ApiRes::error();
            }
        } else {
            $category->status = '1';
            $status = $category->update();
            if ($status) {
                return  ApiRes::success('Status Changed Successfully!');
            } else {
                return  ApiRes::error();
            }
        }
    }

    public function deleteCategory(Request $req)
    {
        $cate = Category::Where('id', $req->id)->first();
        if ($cate->img != null) {
            File::delete($cate->img);
        }

        $status = $cate->delete();

        if ($status) {
            return  ApiRes::success('Category Deleted Successfully!');
        } else {
            return  ApiRes::error();
        }
    }

    public function testMethod(Request $req)
    {
        $requestData = $req->all();
        return ApiRes::data('Data', $requestData);
    }
}
