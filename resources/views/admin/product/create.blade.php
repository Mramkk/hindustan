@extends('admin.layouts.master')
@section('title', 'Add Product')
@section('nav-title', 'Add Product')
@section('admin-css')
    <link rel="stylesheet" href="{{ asset('public/vendor/laraberg/css/laraberg.css') }}">
    <script src="https://unpkg.com/react@17.0.2/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@17.0.2/umd/react-dom.production.min.js"></script>
@endsection


@section('main-content')

    <div class="card card-border-top">
        <div class="card-body p-4">
            <form id="frm" method="POST" action="{{ route('product.save') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <label for="input1" class="form-label">Title<span class="text-danger">*</span></label>
                    @if (Session::has('success'))
                        <label class="float-end fs-4 fw-bold text-success">{{ Session::get('success')}}</label>
                        @php
                            Session::forget('success');
                        @endphp
                    @endif
                    <input type="text" class="form-control" id="input1" name="title"
                        placeholder="Enter Product Title" value="{{ old('title') }}" required>
                    @error('title')
                        <span class="text-danger">* {{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 my-2">
                    <label for="input1" class="form-label">Short Description</label>
                    <textarea name="short_description" id="" cols="30" rows="4" class="form-control">{{ old('short_description') }}</textarea>
                </div>

                <div class="col-md-12 my-2">
                    <label for="input1" class="form-label">Long Description</label>
                    <textarea id="long_description" name="long_description">{{ old('long_description') }}</textarea>
                </div>

                <div class="row mt-3 g-3">
                    <div class="col-md-4">
                        <label>Regular Price (Rs.)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-3" name="regular_price" id="regular_price"
                            placeholder="Rs." {{ old('regular_price') }} required>
                        @error('regular_price')
                            <span class="text-danger">* {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label>Selling Price (Rs.)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-3" name="selling_price" id="selling_price"
                            placeholder="Rs." {{ old('selling_price') }} required>
                        @error('selling_price')
                            <span class="text-danger">* {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label>Discount (%)</label>
                        <input type="text" id="disc" class="form-control" placeholder="%">
                        <input type="text" id="discount" name="discount" hidden>
                    </div>

                    <div class="col-md-4">
                        <label>Category</label>
                        <label class="float-end px-2 text-success" data-bs-toggle="modal"
                            data-bs-target="#addCategoryModal">+ Add Category</label>
                        <select name="category" class="form-control" id="category">
                            <option value="">Select Category</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Brand</label>
                        <label class="float-end px-2 text-success" data-bs-toggle="modal" data-bs-target="#addBrandModal">+
                            Add Brand</label>
                        <select name="brand" class="form-control" id="brand">
                            <option value="">Select Brand</option>
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Quantity<span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="quantity" id="quantity" required>
                    </div>

                    <div class="col-md-4">
                        <label>Unit<span class="text-danger">*</span></label>
                        <label class="float-end px-2 text-success" data-bs-toggle="modal" data-bs-target="#addUnitModal">+
                            Add Unit</label>
                        <select name="unit" class="form-control" id="unit" required>
                            <option value="">Select Unit</option>
                        </select>
                        @error('unit')
                            <span class="text-danger">* {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>

                </div>

                <div class="row mt-3">
                    <label>Upload Product Images (JPEG, JPG, PNG)<span class="text-danger">*</span></label>
                    <div class="col-md-3">
                        <x-Img src="{{ asset('public/assets/images/dummy.webp') }}" id="img1" name="file1"
                            btnid="delete1" />
                    </div>

                    <div class="col-md-3">
                        <x-Img src="{{ asset('public/assets/images/dummy.webp') }}" id="img2" name="file2"
                            btnid="delete2" />
                    </div>

                    <div class="col-md-3">
                        <x-Img src="{{ asset('public/assets/images/dummy.webp') }}" id="img3" name="file3"
                            btnid="delete3" />
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        @if($errors->any())
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li class="text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
                
                <div class="row mt-2">
                    <div class="col-md-3">
                        <button class="btn btn-primary mt-3" id="btnSubmit" type="submit">Save</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

    {{-- Models  --}}

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addCategoryModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                    <h6 class="text-success mx-3" id="categoryStatusMsg"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="categoryForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter category title"
                                required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="col-md-5">
                                <label class="form-label">Upload Image (<span class="text-danger">400 X
                                        400</span>)</label>
                                <x-Img src="{{ asset('public/assets/images/dummy.webp') }}" id="category_image"
                                    name="category_image_file" btnid="delete_category_image" />
                                @error('category_image_file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div>
                            <button type="submit" class="btn btn-primary">+ Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Brand Modal -->
    <div class="modal fade" id="addBrandModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addBrandModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addBrandModalLabel">Add Brand</h5>
                    <h6 class="text-success mx-3" id="brandStatusMsg"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="brandForm" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter Brand title"
                                required>
                            @error('title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <div class="col-md-5">
                                <label class="form-label">Upload Image (<span class="text-danger">400 X
                                        400</span>)</label>
                                <x-Img src="{{ asset('public/assets/images/dummy.webp') }}" id="brand_image"
                                    name="brand_image_file" btnid="delete_brand_image" />
                                @error('brand_image_file')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <hr>
                        <div>
                            <button type="submit" class="btn btn-primary">+ Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Unit Modal -->
    <div class="modal fade" id="addUnitModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="addUnitModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addUnitModalLabel">Add Unit</h5>
                    <h6 class="text-success mx-3" id="unitStatusMsg"></h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="unitForm">
                        @csrf
                        <div class="mb-3">
                            <label for="inputUnitTitle" class="form-label">Unit Name</label>
                            <input type="text" class="form-control" id="inputUnitTitle" name="unit"
                                placeholder="Enter unit name">
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary">+ Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
@section('admin-js')
    <script src="{{ asset('public/vendor/laraberg/js/laraberg.js') }}"></script>

    <script>
        $(document).ready(function() {
            let api = new ApiService();
            Laraberg.init('long_description');

            $("#img1").click(function() {
                $("#file1").val(null);
                $('#file1').click();
            });
            $("#img2").click(function() {
                $("#file2").val(null);
                $('#file2').click();
            });
            $("#img3").click(function() {
                $("#file3").val(null);
                $('#file3').click();
            });
            $("#category_image").click(function() {
                $("#category_image_file").val(null);
                $('#category_image_file').click();
            });
            $("#brand_image").click(function() {
                $("#brand_image_file").val(null);
                $('#brand_image_file').click();
            });

            $("#file1").change(function() {
                var tmpath = URL.createObjectURL(this.files[0]);
                $('#img1').attr('src', tmpath);
                $("#delete1").show();
            });
            $("#file2").change(function() {
                var tmpath = URL.createObjectURL(this.files[0]);
                $('#img2').attr('src', tmpath);
                $("#delete2").show();
            });
            $("#file3").change(function() {
                var tmpath = URL.createObjectURL(this.files[0]);
                $('#img3').attr('src', tmpath);
                $("#delete3").show();
            });
            $("#category_image_file").change(function() {
                var category_tmp_path = URL.createObjectURL(this.files[0]);
                $('#category_image').attr('src', category_tmp_path);
                $("#delete_category_image").show();
            });
            $("#brand_image_file").change(function() {
                var brand_tmp_path = URL.createObjectURL(this.files[0]);
                $('#brand_image').attr('src', brand_tmp_path);
                $("#delete_brand_image").show();
            });

            if ($('#img1').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete1").hide();
            }
            if ($('#img2').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete2").hide();
            }
            if ($('#img3').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete3").hide();
            }
            if ($('#category_image').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete_category_image").hide();
            }
            if ($('#brand_image').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete_brand_image").hide();
            }

            $("#delete1").click(function() {
                $("#delete1").hide();
                $('#img1').attr('src', "{{ url('public/assets/images/dummy.webp') }}");
            });
            $("#delete2").click(function() {
                $("#delete2").hide();
                $('#img2').attr('src', "{{ url('public/assets/images/dummy.webp') }}");
            });
            $("#delete3").click(function() {
                $("#delete3").hide();
                $('#img3').attr('src', "{{ url('public/assets/images/dummy.webp') }}");
            });
            $("#delete_category_image").click(function() {
                $("#delete_category_image").hide();
                $('#category_image').attr('src', "{{ url('public/assets/images/dummy.webp') }}");
            });
            $("#delete_brand_image").click(function() {
                $("#delete_brand_image").hide();
                $('#brand_image').attr('src', "{{ url('public/assets/images/dummy.webp') }}");
            });

            // discount price
            $('#regular_price').val();
            $('#selling_price').val();
            $('#discount').val();

            $('#regular_price').on('input', function(e) {
                let sellPrice = $('#selling_price').val();
                discountCalc(this.value, sellPrice)
            });

            $('#selling_price').on('input', function(e) {
                let regularPrice = $('#regular_price').val();
                discountCalc(regularPrice, this.value)
            });

            $('#disc').on('input', function(e) {
                let regularPrice = $('#regular_price').val();
                saleValueCalc(regularPrice, this.value);
            });

            function discountCalc(regular, sell) {
                if (regular != "0" && sell != "0") {
                    let cal = 0;
                    cal = Math.round(((regular - sell) / (regular)) * 100);
                    $("#disc").val(cal);
                    $("#discount").val(cal);
                }
            }

            function saleValueCalc(regular, disc) {
                if (regular != "0") {
                    let sale = 0;
                    sale = Math.round(regular - (disc * regular) / 100);
                    $("#discount").val(disc);
                    $('#selling_price').val(sale);
                }
            }

            // load category from api
            function loadCategory() {
                let req = api.getData("../categories");
                req.then((res) => {
                    let options = "";
                    if (res.status == true) {
                        options += `<option value="">Select Category</option>`;
                        res.data.map((item) => {
                            options += `
                            <option value="${item.title}">${item.title}</option>
                            `;
                        })
                        $("#category").html(options);
                    }
                })
            }

            loadCategory();

            $("#categoryForm").submit(function(e) {
                e.preventDefault();
                let req = api.setFormData("../category/add", this);
                req.then((res) => {
                    if (res.status == true) {
                        loadCategory();
                        $("#categoryStatusMsg").html("New Category Added!");
                        $('#categoryForm')[0].reset();
                        $("#delete_category_image").hide();
                        $('#category_image').attr('src',
                            "{{ url('public/assets/images/dummy.webp') }}");
                    } else {
                        alert(res.message);
                    }
                });
            });

            // load brand from api
            function loadBrand() {
                let req = api.getData("../brands");
                req.then((res) => {
                    let options = "";
                    if (res.status == true) {
                        options += `<option value="">Select Brand</option>`;
                        res.data.map((item) => {
                            options += `
                            <option value="${item.title}">${item.title}</option>
                            `;
                        })
                        $("#brand").html(options);
                    }
                })
            }

            loadBrand();

            $("#brandForm").submit(function(e) {
                e.preventDefault();
                let req = api.setFormData("../brand/add", this);
                req.then((res) => {
                    if (res.status == true) {
                        loadBrand();
                        $("#brandStatusMsg").html("New Brand Added!");
                        $('#brandForm')[0].reset();
                        $("#delete_brand_image").hide();
                        $('#brand_image').attr('src',
                            "{{ url('public/assets/images/dummy.webp') }}");
                    } else {
                        alert(res.message);
                    }
                });
            });

            // load unit from api
            function loadUnit() {
                let req = api.getData("../units");
                req.then((res) => {
                    let options = "";
                    if (res.status == true) {
                        options += `<option value="">Select Unit</option>`;
                        res.data.map((item) => {
                            options += `
                            <option value="${item.title}">${item.title}</option>
                            `;
                        })
                        $("#unit").html(options);
                    }
                })
            }

            loadUnit();

            $("#unitForm").submit(function(e) {
            e.preventDefault();
            let req = api.setFormData("../unit/add", this);
            req.then((res) => {
                if (res.status == true) {
                    loadUnit();
                    $("#unitStatusMsg").html("New Unit Added!");
                    $('#unitForm')[0].reset();
                }else{
                    alert(res.message);
                }
            });
        });


        // submit form 

            // $('#frm').submit(function(e) {
            //     e.preventDefault();
            //     $("#btnSubmit").html(
            //         `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Submit`
            //     );

            //     let req = api.setFormData(api.url() + "/admin/product/save", this);
            //     $("#btnSubmit").attr("disabled", true);
            //     req.then((res) => {
            //         if (res.status == true) {
            //             alert(res.message);
            //             // location.reload();
            //             location.href =  api.url() + '/admin/product/table'
            //         } else {
            //             alert(res.message);
            //             location.reload();
            //         }
            //     });
            // });
        });
    </script>

@endsection
