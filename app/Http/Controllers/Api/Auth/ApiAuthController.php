<?php

namespace App\Http\Controllers\Api\Auth;

use App\Helper\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiAuthController extends Controller
{
    public function sendOTP(Request $req)
    {
        $status = false;
        $validator = Validator::make($req->all(), [
            'mobile' => 'required|numeric|digits:10',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('mobile')) {
                return ApiRes::failed($errors->first('mobile'));
            }
        }
        $user = User::where('mobile', $req->mobile)->first();
        if ($user != null) {
            $user->otp = "1234";
            $status =  $user->save();
        } else {
            $user = new User();
            $user->uid = mt_rand(10000000, 99999999);
            $user->mobile = $req->mobile;
            $user->otp = "1234";
            $status =  $user->save();
        }
        if ($status) {
            return ApiRes::success("OTP sent successfully");
        } else {
            return ApiRes::error();
        }
    }
    public function verifyOTP(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'mobile' => 'required|numeric|digits:10',
            'otp' => 'required|string',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->first('mobile')) {
                return ApiRes::failed($errors->first('mobile'));
            } else if ($errors->first('otp')) {
                return ApiRes::failed($errors->first('otp'));
            }
        }
        $user = User::where('mobile', $req->mobile)->first();
        if ($user != null) {
            if ($user->otp == $req->otp) {
                $token = $user->createToken($user->uid)->plainTextToken;
                return ApiRes::rlMsg("You login successfully !.",  $token);
            } else {
                return ApiRes::credentials();
            }
        } else {
            return ApiRes::error();
        }
    }
    public function logout(Request $req)
    {
        $req->user()->currentAccessToken()->delete();
        return ApiRes::logout();
    }
}
