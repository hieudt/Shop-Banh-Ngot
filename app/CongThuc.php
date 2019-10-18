<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CongThuc extends Model
{
    protected $table = "cong_thuc";

    public function nguyenlieu()
    {
        return $this->belongsto('App\NguyenLieu', 'id_nguyenlieu');
    }

    public function sanpham()
    {
        return $this->belongsto('App\SanPham', 'id_sanpham');
    }
}
