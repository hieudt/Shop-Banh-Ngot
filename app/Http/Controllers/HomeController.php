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
}
