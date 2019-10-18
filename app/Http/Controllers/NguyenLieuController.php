<?php

namespace App\Http\Controllers;

use App\NguyenLieu;
use Yajra\Datatables\Datatables;
use Illuminate\Http\Request;
use Image;

class NguyenLieuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.nguyenlieu.index');
    }

    public function fetch()
    {
        return Datatables::of(NguyenLieu::all())
        ->editColumn('image', function($data) {
            return "<img src='".url($data->image)."'>";
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
        return view('manage.nguyenlieu.create');
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
        $thumbnailImage->resize(80,80);
        $nameImage = $thumbnailPath.time().$originalImage->getClientOriginalName();
        $thumbnailImage->save($nameImage); 

        $nl = new NguyenLieu;
        $nl->ten = $request->ten;
        $nl->donvi = $request->donvi;
        $nl->soluong = $request->soluong;
        $nl->dongia = $request->dongia;
        $nl->image = $nameImage;
        $nl->save();

        return response()->json(['success' => 'Added'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NguyenLieu  $nguyenLieu
     * @return \Illuminate\Http\Response
     */
    public function show(NguyenLieu $nguyenLieu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NguyenLieu  $nguyenLieu
     * @return \Illuminate\Http\Response
     */
    public function edit(NguyenLieu $nguyenLieu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NguyenLieu  $nguyenLieu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NguyenLieu $nguyenLieu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\NguyenLieu  $nguyenLieu
     * @return \Illuminate\Http\Response
     */
    public function destroy(NguyenLieu $nguyenLieu)
    {
        //
    }
}
