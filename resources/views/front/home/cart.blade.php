@extends('front.master')
@section('content')
<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <p><a href="javascript:void(0)" id="updateCart" class="btn btn-primary py-3 px-4">Cập Nhật Giỏ Hàng</a></p>
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Tên sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (Cart::content() as $item)
                            <tr class="text-center">
                                <td class="product-remove"><a href="#"><span class="ion-ios-close"></span></a></td>

                                <td class="image-prod">
                                    <div class="img" style="background-image:url({{ $item->model->image }});"></div>
                                </td>

                                <td class="product-name">
                                    <h3>{{ $item->name }}</h3>
                                    
                                </td>

                                <td class=" price">{{ $item->price }} VND
                                </td>

                                <td class="quantity">
                                    <div class="input-group mb-3">
                                        <input type="text" name="quantity" class="quantity form-control input-number"
                                            value="{{ $item->qty }}" min="1" max="100">
                                        <input type="hidden" class="row-id" value="{{ $item->rowId }}">
                                    </div>
                                </td>

                                <td class="total">{{ $item->price * $item->qty }}</td>
                            </tr><!-- END TR-->
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-8 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Thông tin giao hàng</h3>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">SĐT</label>
                            <input type="text" id="sdt" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="country">Họ Tên KH</label>
                            <input type="text" id="hoten" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="country">Địa chỉ giao hàng</label>
                            <input type="text" id="address" class="form-control text-left px-3" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Chú thích</label>
                            <textarea class="form-control" id="chuthich" name="" id="" rows="3"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Hóa đơn</h3>
                    <p class="d-flex total-price">
                        <span>Tổng tiền</span>
                        <span>{{ Cart::subtotal() }} VND</span>
                    </p>
                    <p class="d-flex total-price">
                        <span>Phương thức thanh toán</span>
                        <span>Ship COD</span>
                    </p>
                </div>
                <p><a href="javascript:void(0)" id="checkoutButton"  class="btn btn-primary py-3 px-4">Tiến hành thanh toán</a></p>
            </div>
        </div>
    </div>
</section>
@endsection