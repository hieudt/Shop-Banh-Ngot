<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\HoaDonNhap;
use App\NguyenLieu;
use App\DaiLy;
use DB;
use App\ChiTietHDN;

class HoaDonNhapController extends Controller
{
    public function index()
    {
        return view('manage.hoadonnhap.index');
    }

    public function fetch()
    {
        return Datatables::of(HoaDonNhap::all())
        ->addColumn('tongtien', function($data) {
            $tongtien = 0;
            foreach ($data->chitiet as $item) {
                $tongtien += $item->soluong * $item->thanhtien;
            }
            return $tongtien;
        })
        ->addColumn('action', function ($data) {
            return '<a href="'.route('hoadonnhap.show', ['id' => $data->id]).'" class="btn btn-primary" data-id="'.$data->id.'"><i class="fa fa-fw fa-eye"></i>Xem </a>';
        })
        ->rawColumns(['action', 'tongtien'])
        ->make(true);
    }

    public function create()
    {
        $DL = DaiLy::all();
        $NL = NguyenLieu::all();
        return view('manage.hoadonnhap.create')->with('data',$NL)->with(compact('DL'));
    }

    public function store(Request $req)
    {
        DB::beginTransaction();
        try { 
            $HD = new HoaDonNhap;
            $HD->id_daily = $req->dataPost[0]['id_daily'];
            $HD->save();

            
            foreach ($req->dataPost as $item) {
                $HDN = new ChiTietHDN;
                $HDN->id_hdn = $HD->id;
                $HDN->id_nguyenlieu = $item['id'];
                $HDN->soluong = $item['soluong'];
                $HDN->thanhtien = $item['thanhtien'];
                $HDN->save();  
            }

            DB::commit();
            return response()->json(true);
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function show($id) {
        $HD = HoaDonNhap::find($id);

        return view('manage.hoadonnhap.show')->with(compact('HD'));
    }

    public function print($id) {
        $HD = HoaDonNhap::find($id);

        return view('manage.hoadonnhap.print')->with(compact('HD'));
    }

}
