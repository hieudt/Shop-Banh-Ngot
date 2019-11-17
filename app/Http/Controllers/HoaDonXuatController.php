<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\HoaDonXuat;
use App\Comment;

class HoaDonXuatController extends Controller
{
    public function index()
    {
        return view('manage.hoadonxuat.index');
    }

    public function show($id) {
        $HD = HoaDonXuat::find($id);

        return view('manage.hoadonxuat.show')->with(compact('HD'));
    }

    public function print($id) {
        $HD = HoaDonXuat::find($id);

        return view('manage.hoadonxuat.print')->with(compact('HD'));
    }

    public function fetch()
    {
        return Datatables::of(HoaDonXuat::all())
        ->editColumn('status', function($data) {
            $label = "";
            $name = "";

            if ($data->status == 0) {
                $label = "danger";
                $name = "Chờ xử lý";
            }

            if ($data->status == 1) {
                $label = "primary";
                $name = "Đã xử lý";
            }

            if ($data->status == 2) {
                $label = "success";
                $name = "Đã giao";
            }

            if ($data->status == 3) {
                $label = "dark";
                $name = "Đã hủy";
            }

            return "<span class='label label-{$label}'> {$name} </span>";
        })
        ->addColumn('action', function ($data) {
            return '<a href="'.route('hoadon.show', ['id' => $data->id]).'" class="btn btn-primary" data-id="'.$data->id.'"><i class="fa fa-fw fa-edit"></i>Sửa </a>&nbsp<button class="btn btn-danger delete" data-id="'.$data->id.'"><i class="fa fa-fw fa-trash-o"></i>Xóa </button>';
        })
        ->rawColumns(['action','status'])
        ->make(true);
    }

    public function comment(Request $req)
    {
        $cm = new Comment;
        $cm->id_hdx = $req->id_hdx;
        $cm->messages = strip_tags($req->messages);
        $cm->save();

        return response()->json(['success' => 'Ok'], 200);
    }
}
