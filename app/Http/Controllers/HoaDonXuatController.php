<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\HoaDonXuat;

class HoaDonXuatController extends Controller
{
    public function index()
    {
        return view('manage.hoadonxuat.index');
    }

    public function fetch()
    {
        return Datatables::of(HoaDonXuat::all())
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary" data-id="'.$data->id.'"><i class="fa fa-fw fa-edit"></i>Sửa </button>&nbsp<button class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-fw fa-trash-o"></i>Xóa </button>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
