<?php

namespace App\Http\Controllers\Api\User;

use App\Helper\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ApiUserController extends Controller
{
    public function data()
    {
        $user = User::where('id', auth()->user()->id)->get();
        if ($user) {
            return ApiRes::data("Datalist", $user);
        } else {
            return ApiRes::error();
        }
    }
}
