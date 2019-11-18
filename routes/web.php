<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/show/{id}', 'HomeController@fetchProduct')->name('home.showproduct');
Route::get('/cart', 'HomeController@cart')->name('cart.show');
Route::post('/cart/add', 'HomeController@cartAdd')->name('cart.add');
Route::post('/cart/update', 'HomeController@updateNumber')->name('cart.update');
Route::post('/cart/checkout', 'HomeController@cartCheckout')->name('cart.checkout');
Route::get('/cart/success', function () {
    return view('front.home.cartsuccess');
})->name('home.success');
Route::get('/shop', 'HomeController@shop')->name('home.shop');


Route::group(['prefix' => 'admin'], function () {
    Route::get('index', function () {
        return view('manage.home');
    })->name('admin.home');

    Route::group(['prefix' => 'users'], function () {
        Route::get('index', 'UserController@index')->name('users.index');
        Route::get('fetch', 'UserController@fetch')->name('users.fetch');
    });

    Route::group(['prefix' => 'nguyenlieu'], function () {
        Route::get('index', 'NguyenLieuController@index')->name('nguyenlieu.index');
        Route::get('fetch', 'NguyenLieuController@fetch')->name('nguyenlieu.fetch');
        Route::get('create', 'NguyenLieuController@create')->name('nguyenlieu.create');
        Route::post('store', 'NguyenLieuController@store')->name('nguyenlieu.store');
    });


    Route::group(['prefix' => 'congthuc'], function () {
        Route::get('index', 'CongThucController@index')->name('congthuc.index');
        Route::get('fetch', 'CongThucController@fetch')->name('congthuc.fetch');
        Route::get('create', 'CongThucController@create')->name('congthuc.create');
        Route::post('store', 'CongThucController@store')->name('congthuc.store');
    });

    Route::group(['prefix' => 'sanpham'], function () {
        Route::get('index', 'SanPhamController@index')->name('sanpham.index');
        Route::get('fetch', 'SanPhamController@fetch')->name('sanpham.fetch');
        Route::get('create', 'SanPhamController@create')->name('sanpham.create');
        Route::post('store', 'SanPhamController@store')->name('sanpham.store');
    });

    Route::group(['prefix' => 'hoadon'], function () {
        Route::get('index', 'HoaDonXuatController@index')->name('hoadon.index');
        Route::get('fetch', 'HoaDonXuatController@fetch')->name('hoadon.fetch');
        Route::get('create', 'HoaDonXuatController@create')->name('hoadon.create');
        Route::post('store', 'HoaDonXuatController@store')->name('hoadon.store');
        Route::get('show/{id}', 'HoaDonXuatController@show')->name('hoadon.show');
        Route::get('print/{id}', 'HoaDonXuatController@print')->name('hoadon.print');
        Route::post('comment', 'HoaDonXuatController@comment')->name('hoadon.comment');
        Route::post('update', 'HoaDonXuatController@update')->name('hoadon.update');
    });
});