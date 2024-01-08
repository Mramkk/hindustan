<?php

namespace App\Http\Controllers\Auth;

use App\Helper\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        if (!empty($req->action)) {
            if ($req->action == 'SEND_OTP') {
                // $req->validate([
                //     'mobile' => 'required|numeric|digits:10'
                // ]);

                $req->session()->put('mobile', $req->mobile);
                $user = User::where('mobile', $req->mobile)->first();
                // $otp = rand(1000, 9999);
                $otp = 1234;
                $uid = rand(10000000, 99999999);

                if (!empty($user) and $user->mobile == $req->mobile) {
                    $user->otp = $otp;
                    $status = $user->save();
                    if ($status) {
                        return ApiRes::success("Otp has been sent to your Mobile.");
                    } else {
                        return ApiRes::failed("Otp Send Failed");
                    }
                } else {
                    $userx = new User();
                    $userx->uid = $uid;
                    $userx->mobile = $req->mobile;
                    $userx->otp = $otp;
                    $status = $userx->save();
                    if ($status) {
                        return ApiRes::success("Otp has been sent to your Mobile.");
                    } else {
                        return ApiRes::failed("Otp Send Failed");
                    }
                }
            }
            if ($req->action == 'VERIFY_OTP') {
                $req->merge(["mobile" => $req->session()->get('mobile')]);
                $otp = $req->otp;
                $user = User::where('mobile', $req->mobile)->where('otp', $otp)->first();
                if (!empty($user)) {
                    $otp = $user->otp;
                    if ($otp == $req->otp) {
                        $user->otp = null;
                        $user->status = "verified";
                        $status = $user->save();
                        if ($status) {
                            Auth::login($user);
                            return ApiRes::success("OTP Verified");
                        } else {
                            return ApiRes::failed("Invalid OTP");
                        }
                    }
                } else {
                    return ApiRes::failed("Invalid OTP");
                }
            }
        }

        // if ($status) {
        //     return ApiRes::success("OTP Sent");
        // } else {
        //     return ApiRes::error();
        // }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('./');
    }
}
