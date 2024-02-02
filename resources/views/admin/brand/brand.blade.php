@extends('admin.layouts.master')
@section('title', 'Brand')
@section('nav-title', 'Brand')

@section('main-content')

    @if (Session::has('success'))
        <div class="col-12">
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-1">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">{!! Session::get('success') !!}</h6>

                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>

        {{ Session::forget('success') }}
    @endif
    @if (Session::has('error'))
        <div class="col-12">
            <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-1">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-x-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">{!! Session::get('error') !!}</h6>

                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>

        {{ Session::forget('error') }}
    @endif


    <div class="card card-border-top">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title">Add New Brand</h5>
                <h6 class="text-success" id="statusMsg"></h6>
            </div>
            
            <hr />
            <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-8">

                        <form id="brandForm" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter brand title"
                                    required>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-5">
                                    <label class="form-label">Upload Image (<span class="text-danger">Minimum 400 X
                                            400</span>)</label>
                                    <div style="width: 200px; height: 200px;">
                                        <x-Img src="{{ asset('public/assets/images/dummy.webp') }}" id="brand_image"
                                            name="brand_image_file" btnid="delete_brand_image" />
                                    </div>
                                    @error('brand_image_file')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">+ Add</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <h6 class="mb-0 text-uppercase">Brands List</h6>
    <hr />
    <div class="card card-border-top">
        <div class="card-body">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="table_body">
                    {{-- @foreach ($brand as $key => $item)
                        <tr>
                            <td class="align-middle">
                                <img class="rounded" src="{{ asset($item->img) }}" alt="" width="100px"
                                    height="80px">
                            </td>
                            <td class="w-75 align-middle">
                                <h6>{{ $item->title }}</h6>
                            </td>
                            <td class="align-middle">
                                @if ($item->status == 1)
                                    <div class="form-check form-switch form-check">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            onclick="status(this.id)" id="{{ $item->id }}" checked>
                                    </div>
                                @else
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            onclick="status(this.id)" id="{{ $item->id }}">
                                    </div>
                                @endif

                            </td>
                            <td class="align-middle">
                                <a href="#" id="{{ $item->id }}" onclick="brandDelete(this.id)">
                                    <i class='bx bxs-trash text-danger font-20'></i></a>
                            </td>
                        </tr>
                    @endforeach --}}
                </tbody>
            </table>
        </div>
    </div>


@endsection

@section('admin-js')
    <script>
        let api = new ApiService();

        $(document).ready(function() {
            $('.alert').alert();
            setTimeout(() => {
                $('.alert').alert('close')
            }, 3000)
            $("#brand_image").click(function() {
                $("#brand_image_file").val(null);
                $('#brand_image_file').click();
            });

            if ($('#brand_image').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete_brand_image").hide();
            }

            $("#brand_image_file").change(function() {
                var brand_tmp_path = URL.createObjectURL(this.files[0]);
                $('#brand_image').attr('src', brand_tmp_path);
                $("#delete_brand_image").show();
            });

            $("#delete_brand_image").click(function() {
                $("#delete_brand_image").hide();
                $('#brand_image').attr('src', "{{ url('public/assets/images/dummy.webp') }}");
            });
        });

        $("#brandForm").submit(function(e) {
            e.preventDefault();
            let req = api.setFormData("brand/add", this);
            req.then((res) => {
                if (res.status == true) {
                    loadData();
                    $("#statusMsg").html(res.message);
                    $('#brandForm')[0].reset();
                    $("#delete_brand_image").hide();
                    $('#brand_image').attr('src', "{{ url('public/assets/images/dummy.webp') }}");
                }else{
                    alert(res.message);
                }
            });
        });

        function loadData() {
            let req = api.getData("brands");
            req.then((res) => {
                let table_body = '';
                if (res.status == true) {
                    res.data.map((item) => {
                        table_body += `<tr>
                            <td class="align-middle">
                                <img class="rounded" src="../${item.img}" alt="brand image" width="100px" height="80px">
                            </td>
                            <td class="w-75 align-middle">
                                <h6>${item.title}</h6>
                            </td>
                            <td class="align-middle">`;
                        if (item.status == 1) {
                            table_body += `<div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        onclick="status(this.id)" id="${item.id}" checked>
                                </div>`
                        } else {
                            table_body += `<div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" role="switch"
                                        onclick="status(this.id)" id="${item.id}">
                            </div>`
                        }
                        table_body += `</td>
                            <td class="align-middle">
                                <span id="${item.id}" onclick="brandDelete(this.id)">
                                <i class='bx bxs-trash text-danger font-20'></i></span>
                            </td>
                            </tr>`;
                    });
                    return $("#table_body").html(table_body);
                }
            });
        }

        loadData();

        function status(id) {
            var data = {
                "_token": "{{ csrf_token() }}",
                "id": id
            };
            let req = api.setData("brand/status", data);
            req.then((res) => {
                if (res.status == true) {
                    loadData();
                    $("#statusMsg").html(res.message);
                } else {
                    alert(res.message);
                    loadData();
                }
            });
        }

        function brandDelete(id) {
            var data = {
                "_token": "{{ csrf_token() }}",
                "id": id
            };
            let req = api.setData("brand/delete", data);
            req.then((res) => {
                if (res.status == true) {
                    loadData();
                    $("#statusMsg").html(res.message);
                } else {
                    alert(res.message);
                    loadData();
                }
            });
        }
    </script>
@endsection
