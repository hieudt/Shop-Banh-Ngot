<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHDX extends Model
{
    protected $table = "chi_tiet_h_d_x_e_s";

    public function sanpham(){
        return $this->belongsTo('App\SanPham','id_sanpham','id');
    }

    public function hoadonxuat(){
        return $this->belongsTo('App\HoaDonXuat','id_hdx','id');
    }
}
