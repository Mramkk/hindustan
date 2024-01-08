<?php

namespace App\Http\Controllers\Api\Category;

use App\Helper\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    public function data()
    {
        $category = Category::where('status', '1')->latest()->get();
        return ApiRes::data("datalist",$category);
    }
}
