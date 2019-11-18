@extends('front.master')
@section('content')
<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-shipped"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Ship Miễn Phí</h3>
                        <span>Trong khoảng cách 1km</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-diet"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Nguyên liệu chất lượng</h3>
                        <span>Phục vụ khách hàng</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-award"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Uy tín hàng đầu</h3>
                        <span>Chất lượng sản phẩm là trên hết</span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Hỗ trợ</h3>
                        <span>24/7 Hỗ trợ khách hàng</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex"
                            style="background-image: url({{ asset('images/p6.jpg') }});">
                            <div class="text text-center">
                                <h2>HM Cake</h2>
                                <p>Mang đến hương vị bánh kem cho mọi nhà</p>
                                <p><a href="#" class="btn btn-primary">Đặt bánh ngay</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                            style="background-image: url({{ asset('images/p1.jpg') }});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Sinh Nhật</a></h2>
                            </div>
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end"
                            style="background-image: url({{ asset('images/p2.jpeg') }});">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Tình yêu</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end"
                    style="background-image: url({{ asset('images/p3.jpg') }});">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Tiệc tùng</a></h2>
                    </div>
                </div>
                <div class="category-wrap ftco-animate img d-flex align-items-end"
                    style="background-image: url({{ asset('images/p4.jpg') }});">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Tráng Miệng</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Sản phẩm</span>
                <h2 class="mb-4">Mới Nhất</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($SP as $p)
            <div class="col-md-6 col-lg-3 ftco-animate">
                <div class="product">
                    <a href="{{ route('home.showproduct', ['id' => $p->id]) }}" class="img-prod"><img class="img-fluid"
                            src="{{ $p->image }}" alt="Colorlib Template">
                        <div class="overlay"></div>
                    </a>
                    <div class="text py-3 pb-4 px-3 text-center">
                        <h3><a href="{{ route('home.showproduct', ['id' => $p->id]) }}">{{ $p->ten }}</a></h3>
                        <div class="d-flex">
                            <div class="pricing">
                                <p class="price"><span class="mr-2 price-dc">{{ $p->giaban + 35000 }} Vnd</span><span
                                        class="price-sale">{{ $p->giaban }} Vnd</span>
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

<section class="ftco-section img" style="background-image: url({{ asset('images/banner.jpg') }});">
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-md-6 heading-section ftco-animate deal-of-the-day ftco-animate">
                <span class="subheading">Giảm giá cực sốc</span>
                <h2 class="mb-4">Khuyến Mãi Trong Ngày</h2>
                <h3><a href="#">Toàn sản phẩm</a></h3>
                <span class="price">Giảm <a href="#">20.000 VNĐ</a></span>
                <div id="timer" class="d-flex mt-5">
                    <div class="time" id="days"></div>
                    <div class="time pl-3" id="hours"></div>
                    <div class="time pl-3" id="minutes"></div>
                    <div class="time pl-3" id="seconds"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section testimony-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section ftco-animate text-center">
                <span class="subheading">Đánh giá</span>
                <h2 class="mb-4">Cảm nhận từ khách hàng</h2>
            </div>
        </div>
        <div class="row ftco-animate">
            <div class="col-md-12">
                <div class="carousel-testimony owl-carousel">
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url({{ asset('IMG_2172.JPG') }});">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Bánh ngon vãi ***.</p>
                                <p class="name">Hieu Duong</p>
                                <span class="position">Developer Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url({{ asset('IMG_2172.JPG') }});">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Bánh ngon.</p>
                                <p class="name">Hieu Duong</p>
                                <span class="position">Developer Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url({{ asset('IMG_2172.JPG') }});">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Bánh ngon.</p>
                                <p class="name">Hieu Duong</p>
                                <span class="position">Developer Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url({{ asset('IMG_2172.JPG') }});">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Bánh ngon.</p>
                                <p class="name">Hieu Duong</p>
                                <span class="position">Developer Manager</span>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimony-wrap p-4 pb-5">
                            <div class="user-img mb-5" style="background-image: url({{ asset('IMG_2172.JPG') }});">
                                <span class="quote d-flex align-items-center justify-content-center">
                                    <i class="icon-quote-left"></i>
                                </span>
                            </div>
                            <div class="text text-center">
                                <p class="mb-5 pl-4 line">Bánh ngon.</p>
                                <p class="name">Hieu Duong</p>
                                <span class="position">Developer Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<hr>

<section class="ftco-section ftco-partner">
    <div class="container">
        <div class="row">
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="images/partner-1.png" class="img-fluid"
                        alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="images/partner-2.png" class="img-fluid"
                        alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="images/partner-3.png" class="img-fluid"
                        alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="images/partner-4.png" class="img-fluid"
                        alt="Colorlib Template"></a>
            </div>
            <div class="col-sm ftco-animate">
                <a href="#" class="partner"><img src="images/partner-5.png" class="img-fluid"
                        alt="Colorlib Template"></a>
            </div>
        </div>
    </div>
</section>
@endsection