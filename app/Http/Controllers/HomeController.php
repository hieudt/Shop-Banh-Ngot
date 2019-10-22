<?php

namespace App\Http\Controllers;

use App\SanPham;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $SP = SanPham::all();

        return view('front.home.index')->with(compact('SP'));
    }

    public function fetchProduct($id)
    {
        $SP = SanPham::find($id);
        $SPRela = SanPham::where('id','!=', $id)->take(4)->get();

        return view('front.home.product')->with(compact('SP','SPRela'));
    }
}
