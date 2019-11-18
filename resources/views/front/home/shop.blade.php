@extends('front.master')
@section('content')
<section class="ftco-section">
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

@endsection