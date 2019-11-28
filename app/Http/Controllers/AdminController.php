<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HoaDonXuat;
use App\HoaDonNhap;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function index()
    {
        $donTrongNgay = HoaDonXuat::whereDate('created_at', Carbon::today())->get()->count();
        $donTrongNgayNot = HoaDonXuat::whereDate('created_at', Carbon::today())->where('status', 0)->get()->count();
        $donTrongThang = HoaDonXuat::whereMonth('created_at', Carbon::now()->month)->get()->count();
        $tongTien = HoaDonXuat::whereDate('created_at', Carbon::today())->get()->sum('tongtien');
        $tongTienMonth = HoaDonXuat::whereMonth('created_at', Carbon::now()->month)->get()->sum('tongtien');
        return view('manage.home')->with(compact('donTrongNgay', 'donTrongNgayNot', 'donTrongThang',
            'tongTien',
            'tongTienMonth'
        ));
    }
}
