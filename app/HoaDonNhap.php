<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    protected $table = "hoadonnhap";

    public function chitiet()
    {
    	return $this->hasMany('App\ChiTietHDN', 'id_hdn', 'id');
    }

    public function daily(){
        return $this->belongsTo('App\DaiLy','id_daily','id');
    }
}
