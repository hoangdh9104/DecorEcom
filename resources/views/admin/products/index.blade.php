<style>
    .description {
        max-width: 200px;
        /* Giới hạn chiều rộng của ô mô tả */
        white-space: nowrap;
        /* Ngăn không cho xuống dòng */
        overflow: hidden;
        /* Ẩn phần văn bản vượt quá */
        text-overflow: ellipsis;
        /* Thêm dấu ba chấm khi văn bản quá dài */
    }

    .no-style-btn {
        background: none;
        /* Xóa màu nền */
        border: none;
        /* Xóa viền */
        padding: 0;
        /* Xóa padding */
        margin: 0;
        /* Xóa margin */
        outline: none;
        /* Bỏ outline khi focus */
        cursor: pointer;
        /* Đảm bảo nút vẫn có thể nhấn được */
        all: unset;
        cursor: pointer;
        /* Giữ con trỏ khi hover để người dùng biết có thể click */
    }
</style>
@extends('admin.layouts.master')
@section('title', 'Danh sách sản phẩm')
@section('content')
    <div class="content-body" style="min-height: 876px;">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi welcome back!</h4>
                        <p class="mb-0">Your business dashboard template</p>

                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Bootstrap</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            @if (session('message'))
                <div class="alert alert-success alert-dismissible alert-alt solid fade show">
                    <button type="button" class="close h-100" data-dismiss="alert" aria-label="Close"><span><i
                                class="mdi mdi-close"></i></span>
                    </button>
                    <strong>Success!</strong> {{ session('message') }}.
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Danh sách sản phẩm</h4>
                            <a href="{{ route('products.create') }}">
                                <button type="button" class="btn btn-primary">Thêm mới sản phẩm <span
                                        class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped verticle-middle table-responsive-sm">
                                    <thead>
                                        <tr class="text-muted">
                                            <th scope="col">STT</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Category Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Active</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Example Row -->
                                        @foreach ($products as $product)
                                            <tr class="text-muted">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $product->name }}</td>
                                                <td>
                                                    {{-- sử dụng cú pháp này để tránh lỗi
                                                        ỗi Attempt to read property "name" on null
                                                        vì liên quan đến việc xóa mềm --}}
                                                    {{ optional($product->category)->name ?: 'No Category' }}
                                                    {{-- <td>
                                                        {{optional($product->category()->withTrashed()->first())->name}}
                                                     </td> --}}
                                                    {{-- hoặc có thể sử dụng withTrashed() lồng trong cú pháp optional
                                                        để lấy dữ liệu nam của đối tượng đã bị xóa mềm --}}
                                                    {{-- Cú pháp optional() sẽ trả về null nếu $product->category là null, thay vì gây ra lỗi. --}}
                                                </td>
                                                <td>
                                                    {{-- todo image --}}
                                                    @if (!empty($product->image) && Storage::exists($product->image))
                                                        <img src="{{ Storage::url($product->image) }}" width="100px"
                                                            alt="">
                                                        {{-- {{ Storage::url($user->avatar) }} trong Laravel được sử dụng để tạo ra một URL công khai
                                                    từ một file đã được lưu trữ bằng hệ thống Storage của Laravel --}}
                                                    @else
                                                        <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                                            alt="User Avatar" class="avatar-preview"
                                                            style="border-radius: 50%; width: 100px">
                                                    @endif
                                                </td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>
                                                    @if ($product->active)
                                                        <span class="badge badge-success">Sold</span>
                                                    @else
                                                        <span class="badge badge-danger">sale isn't allowed</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <span class="btn-group">
                                                        {{-- nếu chưa được kích hoạt thì show form kích hoạt --}}
                                                        @if ($product->active == 0)
                                                            <form action="{{ route('products.deactive', $product) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="active" value="1">
                                                                <a href="javascript:void(0)" class="mr-4"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Status Active">
                                                                    <button class="no-style-btn" type="submit"> <i
                                                                            class="fa fa-check-circle"
                                                                            style="color: green;"></i></button>
                                                                </a>
                                                            </form>
                                                        @else
                                                            <form action="{{ route('products.active', $product) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <input type="hidden" name="active" value="0">
                                                                <a href="javascript:void(0)" class="mr-4"
                                                                    data-toggle="tooltip" data-placement="top"
                                                                    title="Status Inactive">
                                                                    <button class="no-style-btn"
                                                                        onclick=" return confirm('are you sure ?') "
                                                                        type="submit"> <i class="fa fa-check-circle"
                                                                            style="color: gray;"></i></button>
                                                                </a>
                                                            </form>
                                                        @endif
                                                        {{-- detail --}}
                                                        <a href="{{ route('products.show', $product) }}" class="mr-4"
                                                            data-toggle="tooltip" data-placement="top" title="View">
                                                            <!-- Màu xanh cho icon View -->
                                                            <i class="fa fa-eye" style="color: blue;"></i>
                                                        </a>
                                                        {{-- edit --}}
                                                        <a href="{{ route('products.edit', $product) }}" class="mr-4"
                                                            data-toggle="tooltip" data-placement="top" title="Edit">
                                                            <i class="fa fa-pencil" style="color: orange;"></i>
                                                            <!-- Màu cam cho icon Edit -->
                                                        </a>
                                                        {{-- delete --}}
                                                        <form action="{{ route('products.destroy', $product->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="javascript:void(0)" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <button
                                                                    onclick="return confirm('có chắc chắn thực hiện thao tác này')"
                                                                    type="submit" class="no-style-btn">
                                                                    <!-- Màu đỏ cho icon Delete -->
                                                                    <i class="fa fa-trash" style="color: red;"></i>
                                                                </button>
                                                            </a>
                                                        </form>

                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>{{ $products->links() }}</div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
