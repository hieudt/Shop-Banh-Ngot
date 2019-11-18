<?php

namespace App\Http\Controllers;

use App\SanPham;
use App\HoaDonXuat;
use Cart;
use DB;
use Illuminate\Http\Request;
use App\ChiTietHDX;


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

    public function updateNumber(Request $req){
        if($req->ajax()){
            $cart = "";
            $cart = Cart::get($req->rowId);
            $product = SanPham::find($cart->id);
            if($req->number <= 0)
            return response()->json(['errors'=>['failnumber'=>[0=>'Số lượng không hợp lệ']]],422);

            Cart::update($req->rowId,$req->number);
            return response()->json(['success'=>'Cập nhật giỏ hàng thành công'], 200);
        }
    }

    public function cartCheckout(Request $req) {
        if ($req->ajax()) {
            DB::beginTransaction();
            try {
                $Hd = new HoaDonXuat;
                $Hd->sdt_kh = $req->sdt_kh;
                $Hd->ho_tenkh = $req->ho_tenkh;
                $Hd->status = 0;
                $Hd->diachi_ship = $req->diachi_ship;
                $Hd->chuthich = $req->chuthich;
                $Hd->tongtien = 0;
                $Hd->save();
                $tongTien = 0;
                foreach (Cart::content() as $item) {
                    $CT = new ChiTietHDX;
                    $CT->id_hdx = $Hd->id;
                    $CT->id_sanpham = $item->id;
                    $CT->soluong = $item->qty;
                    $CT->thanhtien = $item->qty * $item->price;
                    $tongTien += $CT->thanhtien;
                    $CT->save();
                }


                $Hdtemp = HoaDonXuat::find($Hd->id);
                $Hdtemp->tongtien = $tongTien;
                $Hdtemp->save();
                Cart::destroy();

                DB::commit();

            } catch (Exception $e) {
                DB::rollBack();
                \Log::error($e);
    
                throw $e;
            }
            
            

            return response()->json(['success' => 'Thanh toan hoa don thanh cong', 'data' => route('home.success')], 200);
        }
    }

    public function shop()
    {
        $SP = SanPham::all();
        return view('front.home.shop')->with(compact('SP'));
    }
}
