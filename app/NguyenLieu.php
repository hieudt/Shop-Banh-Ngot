<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NguyenLieu extends Model
{
    protected $table = "nguyen_lieu";

    public function congthuc()
    {
    	return $this->hasMany('App\CongThuc', 'id_nguyenlieu');
    }

    public function sanpham()
    {
        return $this->belongstoMany('App\SanPham', 'congthuc', 'id_nguyenlieu', 'id_sanpham');
    }
}
