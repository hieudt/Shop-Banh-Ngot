<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DaiLy extends Model
{
    protected $table = "daily";

    public function hoadonnhap()
    {
    	return $this->hasMany('App\HoaDonNhap', 'id_daily', 'id');
    }
}
