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
            <h5 class="card-title">Add New Brand</h5>
            <hr />
            <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-8">

                        <form action="{{ route('brand.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter brand title"
                                    required>
                            </div>
                            <div class="mb-3">
                                <div class="col-md-5">
                                    <label class="form-label">Upload Image (400 X 400)</label>
                                    <x-Img src="{{ asset('public/assets/images/dummy.webp') }}" id="img1"
                                        name="image" btnid="delete1" />
                                    @error('image')
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
                <tbody>
                    @foreach ($brand as $key => $item)
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
                    @endforeach
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
            $("#img1").click(function() {
                $("#image").val(null);
                $('#image').click();
            });

            if ($('#image').attr('src') == "{{ url('public/assets/images/dummy.webp') }}") {
                $("#delete1").hide();
            }

            $("#image").change(function() {
                var tmpath = URL.createObjectURL(this.files[0]);
                $('#img1').attr('src', tmpath);
                $("#delete1").show();
            });


            $("#delete1").click(function() {
                $("#delete1").hide();
                $('#img1').attr('src', "{{ url('public/assets/images/dummy.webp') }}");
            });
        })

        function status(id) {
            var data = {
                "_token": "{{ csrf_token() }}",
                "id": id
            };
            let req = api.setData("brand/status", data);
            req.then((res) => {
                if (res.status == true) {
                    location.reload();
                } else {
                    alert(res.message);
                    location.reload();
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
                    location.reload();
                } else {
                    alert(res.message);
                    location.reload();
                }
            });
        }
    </script>
@endsection
