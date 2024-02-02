@extends('admin.layouts.master')
@section('title', 'Unit')
@section('nav-title', 'Unit')

@section('main-content')

    @if (\Session::has('success'))
        <div class="col-12">
            <div class="alert alert-success border-0 bg-success alert-dismissible fade show py-1">
                <div class="d-flex align-items-center">
                    <div class="font-35 text-white"><i class='bx bxs-check-circle'></i>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0 text-white">{!! \Session::get('success') !!}</h6>
                    </div>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif


    <div class="card card-border-top">
        <div class="card-body p-4">
            
            <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title">Add New Unit</h5>
                <h6 class="text-success" id="statusMsg"></h6>
            </div>
            <hr />
            <div class="form-body mt-4">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="border p-4 rounded">
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
        </div>
    </div>


    <h6 class="mb-0 text-uppercase">Unit List</h6>
    <hr />
    <div class="card card-border-top">
        <div class="card-body">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th scope="col">Sl. No.</th>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="table_body">
                    {{-- @foreach ($unit as $key => $item)
                    <tr>
                        <th scope="row">{{$key + 1}}</th>
                        <td>{{$item->title}}</td>
                        <td>
                            @if ($item->status == 1)
                                <div class="form-check form-switch form-check-danger">
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
                        <td>
                            <a href="#" id="{{ $item->id }}" onclick="unitDelete(this.id)">
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

    $("#unitForm").submit(function(e) {
            e.preventDefault();
            let req = api.setFormData("unit/add", this);
            req.then((res) => {
                if (res.status == true) {
                    loadData();
                    $("#statusMsg").html(res.message);
                    $('#unitForm')[0].reset();
                }else{
                    alert(res.message);
                }
            });
        });

    function loadData() {
            let req = api.getData("units");
            req.then((res) => {
                let table_body = '';
                let slNo = 1;
                if (res.status == true) {
                    res.data.map((item) => {
                        table_body += `<tr>
                            <th scope="row">${slNo++}</th>
                            <td>
                                <h6>${item.title}</h6>
                            </td>
                            <td>`;
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
                                <span id="${item.id}" onclick="unitDelete(this.id)">
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
    let req = api.setData("unit/status", data);
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

function unitDelete(id) {
    var data = {
        "_token": "{{ csrf_token() }}",
        "id": id
    };
    let req = api.setData("unit/delete", data);
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
