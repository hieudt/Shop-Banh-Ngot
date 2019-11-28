<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\DaiLy;

class DaiLyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.daily.index');
    }

    public function fetch()
    {
        return Datatables::of(DaiLy::all())
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.daily.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            
            $dl = new DaiLy;
            $dl->ten_dai_ly = $request->ten_dai_ly;
            $dl->so_dien_thoai = $request->so_dien_thoai;
            $dl->dia_chi = $request->dia_chi;
            $dl->save();

            return response()->json(['success' => 'Thành công'], 200);
        } catch (Exception $e) {
            return response()->json(['errors' => 'Lỗi không xác định'], 500);
        }
    }
}
