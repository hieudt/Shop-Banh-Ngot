<?php

namespace App\Http\Controllers;

use App\SanPham;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Image;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.sanpham.index');
    }

    public function fetch()
    {
        return Datatables::of(SanPham::all())
        ->editColumn('image', function($data) {
            return "<img width='80' height='80' src='".url($data->image)."'>";
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary" data-id="'.$data->id.'"><i class="fa fa-fw fa-edit"></i>Sửa </button>&nbsp<button class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-fw fa-trash-o"></i>Xóa </button>';
        })
        ->rawColumns(['image','action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manage.sanpham.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $originalImage= $request->file('image');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = 'thumbnail/';
        $nameImage = $thumbnailPath.time().$originalImage->getClientOriginalName();
        $thumbnailImage->save($nameImage); 

        $sp = new SanPham;
        $sp->ten = $request->ten;
        $sp->description = $request->description;
        $sp->giaban = $request->giaban;
        $sp->image = $nameImage;
        $sp->save();

        return response()->json(['success' => 'Added'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function show(SanPham $sanPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(SanPham $sanPham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanPham $sanPham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanPham $sanPham)
    {
        //
    }
}
