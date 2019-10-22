<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = "san_pham";

    public function congthuc()
    {
    	return $this->hasMany('App\CongThuc', 'id_sanpham');
    }

    public function chitiethdx()
    {
        return $this->hasMany('App\ChiTietHDX','id_sanpham','id');
    }

    public function hoadon()
    {
        return $this->belongsToMany('App\HoaDonXuat','App\ChiTietHDX','id_sanpham','id_hdx');
    }
}
