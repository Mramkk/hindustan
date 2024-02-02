<?php

namespace App\Http\Controllers\Admin\Unit;

use App\Helper\ApiRes;
use App\Http\Controllers\Controller;
use App\Models\Unit;
use Illuminate\Http\Request;

class AdminUnitController extends Controller
{
    public function index()
    {
        // $unit = Unit::all();
        return view('admin.unit.unit');
    }

    public function loadData()
    {
        $units = Unit::all();
        return ApiRes::data('Unit Data', $units);
    }

    public function save(Request $req)
    {
        try {
            $unit = new Unit();
            $unit->title = $req->unit;
            $status = $unit->save();
            return ApiRes::success('Unit added successfully !');
        } catch (\Throwable $th) {
            return ApiRes::error($th->getMessage());
        }
    }

    public function status(Request $req)
    {
        $unit = Unit::Where('id', $req->id)->first();
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

    public function deleteUnit(Request $req)
    {
        $status = Unit::Where('id', $req->id)->delete();
        if ($status) {
            return  ApiRes::success('Unit Deleted Successfully!');
        } else {
            return  ApiRes::error();
        }
    }
}
