<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDonXuat extends Model
{
    protected $table = "hoa_don_xuats";

    public function chitiet()
    {
    	return $this->hasMany('App\ChiTietHDX', 'id_hdx', 'id');
    }

    public function comments()
    {
    	return $this->hasMany('App\Comment', 'id_hdx', 'id');
    }
}
