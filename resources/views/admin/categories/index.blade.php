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
@section('title', 'Danh sách thể loại')
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
                            <h4 class="card-title">Danh sách thể loại</h4>
                            <a href="{{ route('categories.create') }}">
                                <button type="button" class="btn btn-primary">Thêm mới thể loại <span
                                        class="btn-icon-right"><i class="fa fa-plus"></i></span>
                                </button>
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered verticle-middle table-responsive-sm text-muted">
                                    <thead>
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Products</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td class="description">{{ $category->description }}</td>
                                                {{-- roducts_count không phải là một trường có sẵn trong cơ sở dữ liệu của bạn. Nó là một trường tạm thời được Laravel tự động tạo ra khi bạn sử dụng phương thức withCount() để đếm số lượng sản phẩm liên quan đến mỗi danh mục. --}}
                                                <td>{{ $category->products_count }}</td>
                                                {{-- todo action --}}
                                                <td>
                                                    <span class="btn-group">
                                                        <a href="{{ route('categories.show', $category->id) }}"
                                                            class="mr-4" data-toggle="tooltip" data-placement="top"
                                                            title="Detail">
                                                            <i class="fa fa-eye"></i> <!-- Icon xem -->
                                                        </a>
                                                        <a href="{{ route('categories.edit', $category->id) }}"
                                                            class="mr-4" data-toggle="tooltip" data-placement="top"
                                                            title="Edit">
                                                            <i class="fa fa-pencil color-muted"></i> </a>
                                                        <form action="{{ route('categories.destroy', $category->id) }}"
                                                            method="post">
                                                            @method('DELETE')
                                                            @csrf
                                                            <a href="javascript:void()" data-toggle="tooltip"
                                                                data-placement="top" title="Delete">
                                                                <button
                                                                    onclick="return confirm('có chắc chắn thực hiện thao tác này')"
                                                                    type="submit" class="no-style-btn">
                                                                    <i class="fa fa-close color-danger"></i>
                                                                </button>
                                                            </a>
                                                        </form>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div>{{ $data->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
