@extends('admin.layouts.master')
@section('title', 'Product')
@section('nav-title', 'Product List')

@section('main-content')

    <div class="card card-border-top">
        <div class="card-body p-4">
            <div class="d-flex justify-content-between align-items-center">
                <h6 class="mb-0 text-uppercase">Products List</h6>
                <a href="{{ route('product.create') }}" class="btn btn-primary">+ Add</a>
            </div>
            <hr />
            <div class="table-responsive">
                <table class="table table-bordered mb-0">
                    <thead>
                        <tr>
                            <th scope="col">Sl.No.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Brand</th>
                            <th scope="col">Unit</th>
                            <th scope="col">Current Stocks</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($products) == 0)
                        <tr>
                            <td colspan="8" class="text-center fw-bold ">Product Not Found</td>
                        </tr>
                        @else
                        @foreach ($products as $key => $product)

                            <tr>
                                <th class="align-middle text-center">{{ $key + 1 }}</th>
                                <td class="align-middle">
                                    <img src="{{ url('/') . '/' . $product->img->image }}" alt="product img"
                                        class="rounded" alt="" width="100px"
                                        height="100px">
                                </td>
                                <td class="align-middle">{{ $product->title }}</td>
                                <td class="align-middle text-center">{{ $product->category }}</td>
                                <td class="align-middle text-center">{{ $product->brand }}</td>
                                <td class="align-middle text-center">{{ $product->unit }}</td>
                                <td class="align-middle text-center">{{ $product->current_stock }}</td>
                                <td class="align-middle">
                                    @if ($product->status == 1)
                                        <div class="form-check form-switch form-check-danger">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                onclick="status(this.id)" id="{{ $product->id }}" checked>
                                        </div>
                                    @else
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" role="switch"
                                                onclick="status(this.id)" id="{{ $product->id }}">
                                        </div>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    <a href="{{url('admin/product/edit') . '/' . $product->id}}" >
                                        <i class='bx bxs-edit text-dark font-20'></i></a>
                                    <a href="#" id="{{ $product->pid }}" onclick="productDelete(this.id)">
                                        <i class='bx bxs-trash text-danger font-20'></i></a>
                                </td>
                            </tr>
                        @endforeach

                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>





@endsection

@section('admin-js')
<script>
let api = new ApiService();

function status(id) {
    var data = {
        "_token": "{{ csrf_token() }}",
        "id": id
    };
    let req = api.setData("status", data);
    req.then((res) => {
        if (res.status == true) {
            location.reload();
        } else {
            alert(res.message);
            location.reload();
        }
    });
}

function productDelete(id) {
    var data = {
        "_token": "{{ csrf_token() }}",
        "id": id
    };
    let req = api.setData("delete", data);
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
