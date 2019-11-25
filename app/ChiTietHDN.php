<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHDN extends Model
{
    protected $table = "chitiethdn";

    public function nguyenlieu(){
        return $this->belongsTo('App\NguyenLieu','id_nguyenlieu','id');
    }

    public function hoadonnhap(){
        return $this->belongsTo('App\HoaDonNhap','id_hdn','id');
    }
}
