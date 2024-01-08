<?php

namespace App\Http\Controllers\Api\Brand;

use App\Helper\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class ApiBrandController extends Controller
{
    public function data()
    {
        
        $brand = Brand::where('status', '1')->latest()->get();
        return ApiRes::data("datalist",$brand);
    }
}
