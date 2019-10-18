<?php

namespace App\Http\Controllers;

use App\CongThuc;
use App\NguyenLieu;
use App\SanPham;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CongThucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage.congthuc.index');
    }

    public function fetch()
    {
        return Datatables::of(CongThuc::all())
        ->editColumn('id_sanpham', function($data) {
            return $data->sanpham->ten;
        })
        ->editColumn('id_nguyenlieu', function($data) {
            return $data->nguyenlieu->ten;
        })
        ->addColumn('action', function ($data) {
            return '<button class="btn btn-primary" data-id="'.$data->id.'"><i class="fa fa-fw fa-edit"></i>Sửa </button>&nbsp<button class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-fw fa-trash-o"></i>Xóa </button>';
        })
        ->rawColumns(['id_sanpham','id_nguyenlieu','action'])
        ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $NL = NguyenLieu::all();
        $SP = SanPham::all();

        return view('manage.congthuc.create')->with('data',$NL)->with(compact('SP'));
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
            
            $nl = NguyenLieu::findOrFail($request->id_nguyenlieu);
            $sp = SanPham::findOrFail($request->id_sanpham);
            $ct = new CongThuc;

            $ct->id_nguyenlieu = $nl->id;
            $ct->id_sanpham = $sp->id;
            $ct->soluong = $request->soluong;

            $nl->soluong = $nl->soluong - $request->soluong;
            
            $ct->save();
            $nl->save();

            return response()->json(['success' => 'Thành công'], 200);
        } catch (Exception $e) {
            return response()->json(['errors' => 'Lỗi không xác định'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CongThuc  $congThuc
     * @return \Illuminate\Http\Response
     */
    public function show(CongThuc $congThuc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CongThuc  $congThuc
     * @return \Illuminate\Http\Response
     */
    public function edit(CongThuc $congThuc)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CongThuc  $congThuc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CongThuc $congThuc)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CongThuc  $congThuc
     * @return \Illuminate\Http\Response
     */
    public function destroy(CongThuc $congThuc)
    {
        //
    }
}
