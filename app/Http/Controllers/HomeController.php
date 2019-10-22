<?php

namespace App\Http\Controllers;

use App\SanPham;
use Cart;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $SP = SanPham::all();

        return view('front.home.index')->with(compact('SP'));
    }

    public function fetchProduct($id)
    {
        $SP = SanPham::find($id);
        $SPRela = SanPham::where('id','!=', $id)->take(4)->get();

        return view('front.home.product')->with(compact('SP','SPRela'));
    }

    public function cart()
    {
        return view('front.home.cart');
    }

    public function cartAdd(Request $req)
    {
        if ($req->ajax()) {
            $this->validate($req,[
                'id' => 'required',
                'soluong' => 'required|numeric|min:1|max:100',
            ],[
                'id.required' => 'Sản phẩm không hợp lệ',
                'soluong.required' => 'Vui lòng chọn số lượng',
                'soluong.numeric' => 'Số lượng phải là số',
                'soluong.min' => 'Số lượng ít nhất là 1',
            ]);

            $product = SanPham::find($req->id);

            if(empty($product))
            return response()->json(['errors'=>['faillogin'=>[0=>'Sản phẩm không hợp lệ [ERROR 101]']]],422);

            $checkNumber = Cart::search(function($cartItem,$rowId) use($product){
                return $cartItem->id === $product->id;
            });

            Cart::add($product->id, $product->ten, $req->soluong, $product->giaban)
             ->associate('App\SanPham');

            return response()->json(['success'=>'Thêm giỏ hàng thành công'],200);
        }
    }
}
