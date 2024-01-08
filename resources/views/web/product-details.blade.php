@extends('layouts.master')
@section('title', 'Hindustan Agency | Product Details')

@section('main-content')

    <section class="my-3">
        <div class="container">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Hindustan Agency</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bi bi-house-door"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Products Details</li>
                        </ol>
                    </nav>
                </div>

            </div>
            <!--end breadcrumb-->


            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4 text-center border-end">
                        <img src="{{ asset('public/assets/images/product-imgs/lg/Aluminium Utensils.png') }}"
                            class="img-fluid" alt="item img">
                        <div class="row mb-3 row-cols-auto g-2 justify-content-center mt-3">
                            <div class="col"><img
                                    src="{{ asset('public/assets/images/product-imgs/Aluminium Utensils.png') }}"
                                    width="70" class="border rounded cursor-pointer" alt="img"></div>
                            <div class="col"><img
                                    src="{{ asset('public/assets/images/product-imgs/Aluminium Utensils.png') }}"
                                    width="70" class="border rounded cursor-pointer" alt="img"></div>
                            <div class="col"><img
                                    src="{{ asset('public/assets/images/product-imgs/Aluminium Utensils.png') }}"
                                    width="70" class="border rounded cursor-pointer" alt="img"></div>
                            <div class="col"><img
                                    src="{{ asset('public/assets/images/product-imgs/Aluminium Utensils.png') }}"
                                    width="70" class="border rounded cursor-pointer" alt="img"></div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title">Aluminium Utensils</h4>
                            <div class="d-flex gap-3 py-3">
                                <div class="cursor-pointer">
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star-fill text-warning"></i>
                                    <i class="bi bi-star text-secondary"></i>
                                </div>
                                <div>142 reviews</div>
                                <div class="text-success"><i class="bi bi-cart-check-fill"></i> 134 orders</div>
                            </div>
                            <div class="mb-3">
                                <span class="price h4">₹ 240</span>
                                <span class="text-muted">/per kg</span>
                            </div>
                            <p class="card-text fs-6">Aluminum utensils are primarily made from aluminum, a lightweight and
                                highly conductive metal. It is known for its excellent heat distribution properties, making
                                it a popular choice for cookware.</p>
                            <dl class="row">
                                <dt class="col-sm-3">Category</dt>
                                <dd class="col-sm-9">Aluminium Utensils</dd>

                                <dt class="col-sm-3">Brand</dt>
                                <dd class="col-sm-9">Bajaj</dd>

                                {{-- <dt class="col-sm-3">Delivery</dt>
                                <dd class="col-sm-9">Russia, USA, and Europe </dd> --}}
                            </dl>
                            <hr>
                            <div class="row row-cols-auto row-cols-1 row-cols-md-3 align-items-center">
                                <div class="col">
                                    <label class="form-label">Quantity</label>
                                    <div class="input-group input-spinner">
                                        <button class="btn btn-white" type="button" id="button-plus"> + </button>
                                        <input type="text" class="form-control" value="1">
                                        <button class="btn btn-white" type="button" id="button-minus"> − </button>
                                    </div>
                                </div>
                                {{-- <div class="col">
                                    <label class="form-label">Select size</label>
                                    <div class="">
                                        <label class="form-check form-check-inline">
                                            <input type="radio"class="form-check-input" name="select_size" checked=""
                                                class="custom-control-input">
                                            <div class="form-check-label">Small</div>
                                        </label>
                                        <label class="form-check form-check-inline">
                                            <input type="radio"class="form-check-input" name="select_size" checked=""
                                                class="custom-control-input">
                                            <div class="form-check-label">Medium</div>
                                        </label>

                                        <label class="form-check form-check-inline">
                                            <input type="radio"class="form-check-input" name="select_size" checked=""
                                                class="custom-control-input">
                                            <div class="form-check-label">Large</div>
                                        </label>
                                    </div>
                                </div>
                                <div class="col">
                                    <label class="form-label">Select Color</label>
                                    <div class="color-indigators d-flex align-items-center gap-2">
                                        <div class="color-indigator-item bg-primary"></div>
                                        <div class="color-indigator-item bg-danger"></div>
                                        <div class="color-indigator-item bg-success"></div>
                                        <div class="color-indigator-item bg-warning"></div>
                                    </div>
                                </div> --}}
                            </div>
                            <div class="d-flex gap-3 mt-3">
                                <a href="#" class="btn btn-primary">Buy Now</a>
                                <a href="#" class="btn btn-outline-primary"><span class="text">Add to cart</span>
                                    <i class='bx bxs-cart-alt'></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr />
                <div class="card-body">
                    <ul class="nav nav-tabs nav-primary mb-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#primaryhome" role="tab"
                                aria-selected="true">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-comment-detail font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title"> Product Description </div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primaryprofile" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-bookmark-alt font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Tags</div>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#primarycontact" role="tab"
                                aria-selected="false">
                                <div class="d-flex align-items-center">
                                    <div class="tab-icon"><i class='bx bx-star font-18 me-1'></i>
                                    </div>
                                    <div class="tab-title">Reviews</div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                            <p>Aluminum utensils are primarily made from aluminum, a lightweight and highly conductive
                                metal. It is known for its excellent heat distribution properties, making it a popular
                                choice for cookware.</p>
                            <p>Aluminum utensils require regular cleaning to prevent discoloration. Avoid using abrasive
                                cleaners that can scratch the surface. Hand washing is often recommended.</p>
                        </div>
                        <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                            <p></p>
                        </div>
                        <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                            <p></p>
                        </div>
                    </div>
                </div>

            </div>

            {{-- related products  --}}

            <h6 class="text-uppercase mb-0 my-4">Related Product</h6>
            <hr />
            <div class="row">
                <div class="top-specials">
                    <div class="top-item owl-carousel">
                        
                        <div class="item m-2">
                            <div class="card">
                                <div class="product-card p-2">
                                    <div class="img-box">
                                        <a href="{{ route('product.view') }}">
                                            <img src="{{ asset('public/assets/images/product-imgs/Aluminium Utensils.png') }}" alt="product" class="img-fluid product-item-img">
                                        </a>
                                    </div>
                                    <div>
                                <div class="position-absolute top-0 end-0 m-3 ">
                                    <span class=""><i class="bi bi-heart font-26"></i></span>
                                </div>
                                <div class="position-absolute top-0 start-0">
                                    <p class="text-white p-1 bg-danger"><strong>10%</strong> Off</p>
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
                                    <p>Aluminium Utensils</p>
                                </a>
                                        <div class="clearfix">
                                            <p class="mb-0 float-start">
                                                <span class="me-2 text-decoration-line-through text-danger font-mb-12">₹ 350</span>
                                                <span class="fw-bold font-18 font-mb-14 text-head">₹ 240</span>
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
    
                        <div class="item">
                            <div class="card">
                                <div class="product-card p-2">
                                    <div class="img-box">
                                        <a href="{{ route('product.view') }}">
                                            <img src="{{ asset('public/assets/images/product-imgs/Brass.png') }}" alt="product" class="img-fluid product-item-img">
                                        </a>
                                    </div>
                                    <div>
                                <div class="position-absolute top-0 end-0 m-3 ">
                                    <span class=""><i class="bi bi-heart font-26"></i></span>
                                </div>
                                <div class="position-absolute top-0 start-0">
                                    <p class="text-white p-1 bg-danger"><strong>12%</strong> Off</p>
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
                                    <p>Brass</p>
                                </a>
                                        <div class="clearfix">
                                            <p class="mb-0 float-start">
                                                <span class="me-2 text-decoration-line-through text-danger font-mb-12">₹ 450</span>
                                                <span class="fw-bold font-18 font-mb-14 text-head">₹ 320</span>
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
    
                        <div class="item">
                            <div class="card">
                                <div class="product-card p-2">
                                    <div class="img-box">
                                        <a href="{{ route('product.view') }}">
                                            <img src="{{ asset('public/assets/images/product-imgs/Crockery.png') }}" alt="product" class="img-fluid product-item-img">
                                        </a>
                                    </div>
                                    <div>
                                <div class="position-absolute top-0 end-0 m-3 ">
                                    <span class=""><i class="bi bi-heart font-26"></i></span>
                                </div>
                                <div class="position-absolute top-0 start-0">
                                    <p class="text-white p-1 bg-danger"><strong>18%</strong> Off</p>
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
                                    <p>Crockery</p>
                                </a>
                                        <div class="clearfix">
                                            <p class="mb-0 float-start">
                                                <span class="me-2 text-decoration-line-through text-danger font-mb-12">₹ 250</span>
                                                <span class="fw-bold font-18 font-mb-14 text-head">₹ 170</span>
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
    
                        <div class="item">
                            <div class="card">
                                <div class="product-card p-2">
                                    <div class="img-box">
                                        <a href="{{ route('product.view') }}">
                                            <img src="{{ asset('public/assets/images/product-imgs/Glassware.png') }}" alt="product" class="img-fluid product-item-img">
                                        </a>
                                    </div>
                                    <div>
                                <div class="position-absolute top-0 end-0 m-3 ">
                                    <span class=""><i class="bi bi-heart font-26"></i></span>
                                </div>
                                <div class="position-absolute top-0 start-0">
                                    <p class="text-white p-1 bg-danger"><strong>15%</strong> Off</p>
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
                                    <p>Aluminium Utensils</p>
                                </a>
                                        <div class="clearfix">
                                            <p class="mb-0 float-start">
                                                <span class="me-2 text-decoration-line-through text-danger font-mb-12">₹ 850</span>
                                                <span class="fw-bold font-18 font-mb-14 text-head">₹ 690</span>
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
    
                        <div class="item">
                            <div class="card">
                                <div class="product-card p-2">
                                    <div class="img-box">
                                        <a href="{{ route('product.view') }}">
                                            <img src="{{ asset('public/assets/images/product-imgs/Kitchen Tools.png') }}" alt="product" class="img-fluid product-item-img">
                                        </a>
                                    </div>
                                    <div>
                                <div class="position-absolute top-0 end-0 m-3 ">
                                    <span class=""><i class="bi bi-heart font-26"></i></span>
                                </div>
                                <div class="position-absolute top-0 start-0">
                                    <p class="text-white p-1 bg-danger"><strong>10%</strong> Off</p>
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
                                    <p>Kitchen Tools.png</p>
                                </a>
                                        <div class="clearfix">
                                            <p class="mb-0 float-start">
                                                <span class="me-2 text-decoration-line-through text-danger font-mb-12">₹ 470</span>
                                                <span class="fw-bold font-18 font-mb-14 text-head">₹ 320</span>
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
    
                    </div>
                </div>
                
            </div>
        </div>
    </section>

@endsection
