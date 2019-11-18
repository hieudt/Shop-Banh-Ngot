@extends('front.master')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div id="notif"></div>
        </div>
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="{{ asset($SP->images) }}" class="image-popup"><img src="{{ asset($SP->image) }}"
                        class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <input type="hidden" value="{{ $SP->id }}" id="idProduct">
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3>{{ $SP->ten }}</h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                </div>
                <p class="price"><span>{{ $SP->giaban }} VNĐ</span></p>
                <div class="nguyenlieu">
                    <h6>Nguyên liệu</h6>
                    <ul>
                        @foreach ($SP->congthuc as $ct)
                        <li>{{ $ct->nguyenlieu->ten }} : {{ $ct->soluong }} {{ $ct->nguyenlieu->donvi }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                <p>{!! $SP->description !!}
                </p>
                <div class="row mt-4">
                    <div class="w-100"></div>
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn btn-minus" data-type="minus"
                                data-field="">
                                <i class="ion-ios-remove"></i>
                            </button>
                        </span>
                        <input type="text" id="soluong" name="quantity" class="form-control input-number" value="1"
                            min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn btn-add" data-type="plus"
                                data-field="">
                                <i class="ion-ios-add"></i>
                            </button>
                        </span>
                    </div>
                    <div class="w-100"></div>
                </div>
                <p><a href="javascript:void(0)" class="btn btn-black py-3 px-5" id="addCart">Thêm giỏ hàng</a></p>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Sản Phẩm</span>
                <h2 class="mb-4">Sản phẩm khác</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($SPRela as $p)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{ route('home.showproduct', ['id' => $p->id]) }}" class="img-prod">
                        <img class="img-fluid" src="{{asset($p->image)}}" width="379" height="540" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{ route('home.showproduct', ['id' => $p->id]) }}">{{ $p->ten }}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span class="price-sale">{{ $p->giaban }} VNĐ</span>
                                </p>
                            </div>
                        </div>
                        <div class="bottom-area d-flex px-3">
                            <div class="m-auto d-flex">
                                <a href="{{ route('home.showproduct', ['id' => $p->id]) }}"
                                    class="buy-now d-flex justify-content-center align-items-center mx-1">
                                    <span><i class="ion-ios-cart"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection