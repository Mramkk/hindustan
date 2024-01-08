@extends('admin.layouts.master')
@section('title', 'Edit Product')
@section('nav-title', 'Edit Product')
@section('admin-css')
    <link rel="stylesheet" href="{{ asset('public/vendor/laraberg/css/laraberg.css') }}">
    <script src="https://unpkg.com/react@17.0.2/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@17.0.2/umd/react-dom.production.min.js"></script>
@endsection


@section('main-content')

    <div class="card card-border-top">
        <div class="card-body p-4">
            <form id="frm">
                @csrf
                <input type="text" value="{{ $product->id }}" name="id" hidden>
                <div class="col-md-12">
                    <label for="input1" class="form-label">Title<span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="input1" name="title"
                        placeholder="Enter Product Title" value="{{ $product->title }}">
                    @error('title')
                        <span class="text-danger">* {{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 my-2">
                    <label for="input1" class="form-label">Short Description</label>
                    <textarea name="short_description" id="" cols="30" rows="4" class="form-control">{{ $product->short_description }}</textarea>
                </div>

                <div class="col-md-12 my-2">
                    <label for="input1" class="form-label">Long Description</label>
                    <textarea id="long_description" name="long_description">{{ $product->long_description }}</textarea>
                </div>

                <div class="row mt-3 g-1">
                    <div class="col-md-4">
                        <label>Regular Price (Rs.)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-3" name="regular_price" id="regular_price"
                            placeholder="Rs." value="{{ $product->regular_price }}.00">
                        @error('regular_price')
                            <span class="text-danger">* {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label>Selling Price (Rs.)<span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-3" name="selling_price" id="selling_price"
                            placeholder="Rs." value="{{ $product->selling_price }}.00">
                        @error('selling_price')
                            <span class="text-danger">* {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label>Discount</label>
                        <input type="text" id="disc" class="form-control" value="{{ $product->discount }} %">
                        <input type="text" id="discount" name="discount" hidden>
                    </div>

                    <div class="col-md-4">
                        <label>Category</label>
                        <select name="category" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($category as $item)
                                <option value="{{ $item->title }}"
                                    {{ $product->category == $item->title ? 'selected' : '' }}>{{ $item->title }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Brand</label>
                        <select name="brand" class="form-control">
                            <option value="">Select Brand</option>
                            @foreach ($brand as $item)
                                <option value="{{ $item->title }}"
                                    {{ $product->brand == $item->title ? 'selected' : '' }}>{{ $item->title }}</option>
                            @endforeach

                        </select>
                    </div>

                    <div class="col-md-4">
                        <label>Unit<span class="text-danger">*</span></label>
                        <select name="unit" class="form-control">
                            <option value="">Select Unit</option>
                            @foreach ($unit as $item)
                                <option value="{{ $item->title }}"
                                    {{ $product->unit == $item->title ? 'selected' : '' }}>{{ $item->title }}</option>
                            @endforeach
                        </select>
                        @error('unit')
                            <span class="text-danger">* {{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label>Status</label>
                        <select name="status" class="form-control">
                            <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $product->status == '0' ? 'selected' : '' }}>Deactive</option>
                        </select>
                    </div>

                </div>

                <div class="row mt-3">
                    <label>Upload Product Images<span class="text-danger">*</span></label>
                    <div class="col-md-3">
                        <x-Img src="{{ url('/' . $product->imgmd[0]->image) }}" id="img1" name="file1"
                            btnid="delete1" />
                    </div>

                    <div class="col-md-3">
                        <x-Img src="{{ url('/' . $product->imgmd[1]->image) }}" id="img2" name="file2"
                            btnid="delete2" />
                    </div>

                    <div class="col-md-3">
                        <x-Img src="{{ url('/' . $product->imgmd[2]->image) }}" id="img3" name="file3"
                            btnid="delete3" />
                    </div>

                </div>
                <div class="row mt-2">
                    <div class="col-md-3">
                        <button class="btn btn-primary mt-3" id="btnSubmit" type="submit">Update</button>
                    </div>
                </div>
            </form>

        </div>
    </div>





@endsection
@section('admin-js')
    <script src="{{ asset('public/vendor/laraberg/js/laraberg.js') }}"></script>

    <script>
        $(document).ready(function() {
            Laraberg.init('long_description')

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

            if ($('#img1').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete1").hide();
            }
            if ($('#img2').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete2").hide();
            }
            if ($('#img3').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete3").hide();
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

            // discount price

            $('#discount').val('{{ $product->discount }}');

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
                    $("#disc").val(cal + "%");
                    $("#discount").val(cal);
                }
            }
            
            function saleValueCalc(regular, disc) {
                if(regular != "0") {
                    let sale = 0;
                    sale = Math.round(regular - (disc * regular) / 100);
                    $("#discount").val(disc);
                    $('#selling_price').val(sale);
                }
            }


            let api = new ApiService();
            $('#frm').submit(function(e) {
                e.preventDefault();
                $("#btnSubmit").html(
                    `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Update`
                );

                let req = api.setFormData(api.url() + "/admin/product/edit", this);
                $("#btnSubmit").attr("disabled", true);
                req.then((res) => {
                    if (res.status == true) {
                        alert(res.message);
                        // location.reload();
                        location.href = 'https://jissoftware.in/hindustanapp/admin/product/table'
                    } else {
                        alert(res.message);
                        location.reload();
                    }
                });
            });
        });
    </script>

@endsection
