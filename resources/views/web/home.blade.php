@extends('layouts.master')
@section('title', 'Hindustan Agency')

@section('main-content')

{{-- slider  --}}

<section class="mt-3">
    <div class="container">
        <div class="hero featured-carousel owl-carousel">
            <div class="item">
                <img src="{{ asset('public/assets/images/slider/sldier2.jpg') }}" alt="slider img" class="img-fluid item-img">
            </div>
            <div class="item">
                <img src="{{ asset('public/assets/images/slider/slider1.jpg') }}" alt="slider img" class="img-fluid item-img">
            </div>
        </div>
    </div>
</section>


{{-- / slider  --}}

<section class="my-4">
    <div class="container">
        <img src="{{ asset('public/assets/images/sale_is_live.webp') }}" alt="sale" class="img-fluid">
    </div>
</section>

{{-- top sale  --}}

<section class="top-products my-4">
    <div class="container">
        <h5>Top 40 specials</h5>
        <hr>
        <div class="top-specials">
            <div class="top-item owl-carousel">
                @foreach ($products as $product)
                <div class="item m-2">
                    <div class="card">
                        <div class="product-card p-2">
                            <div class="img-box">
                                <a href="{{ route('product.view') }}">
                                    <img src="{{ url('/') . '/' . $product->img->image }}" alt="product" class="img-fluid product-item-img">
                                </a>
                            </div>
                            <div>
                                <div class="position-absolute top-0 end-0 m-3 ">
                                    <span class=""><i class="bi bi-heart font-26"></i></span>
                                </div>
                                <div class="position-absolute top-0 start-0">
                                    <p class="text-white p-1 bg-danger"><strong>{{$product->discount}}%</strong> Off</p>
                                </div>
                            </div>
                            <div class="content-box">
                                <div class="d-flex align-items-center mt-3 rating">
                                    <div class="cursor-pointer mx-auto">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-secondary"></i>
                                    </div>
                                </div>
                                <a href="{{ route('product.view') }}" class="product-title">
                                    <p>{{Str::limit($product->title, 28)}}</p>
                                </a>
                                <div class="clearfix">
                                    <p class="mb-0 float-start">
                                        <span class="me-2 text-decoration-line-through text-danger font-mb-12">₹
                                            {{$product->regular_price}}</span>
                                        <span class="fw-bold font-18 font-mb-14 text-head">₹
                                            {{$product->selling_price}}</span>
                                    </p>
                                </div>
                                <div class="text-center my-2">
                                    <button class="addtocart">
                                        <div class="pretext">
                                            <i class="bi bi-cart-plus-fill"></i> ADD TO CART
                                        </div>
                                        <div class="pretext done">
                                            <div class="posttext"><i class="bi bi-check-circle-fill"></i> ADDED</div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- most popular  --}}

<section class="top-products my-4">
    <div class="container">
        <h5>Most Popular</h5>
        <hr>
        <img src="{{ asset('public/assets/images/banner/banner1.jpg') }}" alt="banner" class="img-fluid">

        <div class="top-specials">
            <div class="top-item owl-carousel">
                @foreach ($products as $product)
                <div class="item m-2">
                    <div class="card">
                        <div class="product-card p-2">
                            <div class="img-box">
                                <a href="{{ route('product.view') }}">
                                    <img src="{{ url('/') . '/' . $product->img->image }}" alt="product" class="img-fluid product-item-img">
                                </a>
                            </div>
                            <div>
                                <div class="position-absolute top-0 end-0 m-3 ">
                                    <span class=""><i class="bi bi-heart font-26"></i></span>
                                </div>
                                <div class="position-absolute top-0 start-0">
                                    <p class="text-white p-1 bg-danger"><strong>{{$product->discount}}%</strong> Off</p>
                                </div>
                            </div>
                            <div class="content-box">
                                <div class="d-flex align-items-center mt-3 rating">
                                    <div class="cursor-pointer mx-auto">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-secondary"></i>
                                    </div>
                                </div>
                                <a href="{{ route('product.view') }}" class="product-title">
                                    <p>{{Str::limit($product->title, 28)}}</p>
                                </a>
                                <div class="clearfix">
                                    <p class="mb-0 float-start">
                                        <span class="me-2 text-decoration-line-through text-danger font-mb-12">₹
                                            {{$product->regular_price}}</span>
                                        <span class="fw-bold font-18 font-mb-14 text-head">₹
                                            {{$product->selling_price}}</span>
                                    </p>
                                </div>
                                <div class="text-center my-2">
                                    <button class="addtocart">
                                        <div class="pretext">
                                            <i class="bi bi-cart-plus-fill"></i> ADD TO CART
                                        </div>
                                        <div class="pretext done">
                                            <div class="posttext"><i class="bi bi-check-circle-fill"></i> ADDED</div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


{{-- Top Brand  --}}

<section class="top-products my-4 py-3" style="background-color: #FFD700;">
    <div class="container">
        <h5 class="float-start">Shop By Brands</h5>
        <a href="#" class="float-end show-all">Show All</a>
        <br>
        <hr>
        <div class="row my-3 g-3">
            <div class="col-md-2 col-sm-6 brands">
                <div class="card p-3 brand">
                    <a href="#" class="text-center">
                        <img src="{{ asset('public/assets/images/brands-logo/bajaj.png') }}" alt="brand logo" class="img-fluid" width="100">
                        <p class="text-center fw-bold">Bajaj</p>
                    </a>
                </div>
            </div>

            <div class="col-md-2 col-sm-6 brands">
                <div class="card p-3 brand">
                    <a href="#" class="text-center">
                        <img src="{{ asset('public/assets/images/brands-logo/cello.png') }}" alt="brand logo" class="img-fluid" width="100">
                        <p class="text-center fw-bold">Cello</p>
                    </a>
                </div>
            </div>

            <div class="col-md-2 col-sm-6 brands">
                <div class="card p-3 brand">
                    <a href="#" class="text-center">
                        <img src="{{ asset('public/assets/images/brands-logo/kuber.png') }}" alt="brand logo" class="img-fluid" width="100">
                        <p class="text-center fw-bold">Kuber</p>
                    </a>
                </div>
            </div>

            <div class="col-md-2 col-sm-6 brands">
                <div class="card p-3 brand">
                    <a href="#" class="text-center">
                        <img src="{{ asset('public/assets/images/brands-logo/bakeman.png') }}" alt="brand logo" class="img-fluid" width="100">
                        <p class="text-center fw-bold">Bakeman</p>
                    </a>
                </div>
            </div>

            <div class="col-md-2 col-sm-6 brands">
                <div class="card p-3 brand">
                    <a href="#" class="text-center">
                        <img src="{{ asset('public/assets/images/brands-logo/milton.png') }}" alt="brand logo" class="img-fluid" width="100">
                        <p class="text-center fw-bold">Milton</p>
                    </a>
                </div>
            </div>

            <div class="col-md-2 col-sm-6 brands">
                <div class="card p-3 brand">
                    <a href="#" class="text-center">
                        <img src="{{ asset('public/assets/images/brands-logo/otto.png') }}" alt="brand logo" class="img-fluid" width="100">
                        <p class="text-center fw-bold">Otto</p>
                    </a>
                </div>
            </div>
        </div>

    </div>
</section>

<section>
    <div class="container">
        <img src="{{ asset('public/assets/images/banner/banner2.jpg') }}" alt="banner" class="img-fluid">
    </div>
</section>

<section class="top-products my-4">
    <div class="container">
        <h5 class="float-start">Recommended for You</h5>

        <br>
        <hr>


        <div class="top-specials">
            <div class="top-item owl-carousel">
                @foreach ($products as $product)
                <div class="item m-2">
                    <div class="card">
                        <div class="product-card p-2">
                            <div class="img-box">
                                <a href="{{ route('product.view') }}">
                                    <img src="{{ url('/') . '/' . $product->img->image }}" alt="product" class="img-fluid product-item-img">
                                </a>
                            </div>
                            <div>
                                <div class="position-absolute top-0 end-0 m-3 ">
                                    <span class=""><i class="bi bi-heart font-26"></i></span>
                                </div>
                                <div class="position-absolute top-0 start-0">
                                    <p class="text-white p-1 bg-danger"><strong>{{$product->discount}}%</strong> Off</p>
                                </div>
                            </div>
                            <div class="content-box">
                                <div class="d-flex align-items-center mt-3 rating">
                                    <div class="cursor-pointer mx-auto">
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star-fill text-warning"></i>
                                        <i class="bi bi-star text-secondary"></i>
                                    </div>
                                </div>
                                <a href="{{ route('product.view') }}" class="product-title">
                                    <p>{{Str::limit($product->title, 28)}}</p>
                                </a>
                                <div class="clearfix">
                                    <p class="mb-0 float-start">
                                        <span class="me-2 text-decoration-line-through text-danger font-mb-12">₹
                                            {{$product->regular_price}}</span>
                                        <span class="fw-bold font-18 font-mb-14 text-head">₹
                                            {{$product->selling_price}}</span>
                                    </p>
                                </div>
                                <div class="text-center my-2">
                                    <button class="addtocart">
                                        <div class="pretext">
                                            <i class="bi bi-cart-plus-fill"></i> ADD TO CART
                                        </div>
                                        <div class="pretext done">
                                            <div class="posttext"><i class="bi bi-check-circle-fill"></i> ADDED</div>
                                        </div>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

@endsection