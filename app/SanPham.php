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
}
