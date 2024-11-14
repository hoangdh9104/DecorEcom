<style>
    .active-label {
        color: rgb(93, 242, 93);
        /* Màu xanh lá cây cho trạng thái Active */
        font-weight: bold;
    }

    .deactive-label {
        color: rgb(88, 83, 83);
        /* Màu xám cho trạng thái Deactive */
        font-weight: bold;
    }

    /* Thêm khoảng cách giữa các nhãn */
    .radio-inline {
        margin-right: 10px;
    }

    /* Tùy chọn: Đổi màu của input radio khi chọn */
    input[type="radio"]:checked+.active-label {
        color: rgb(14, 142, 14);
        /* Màu xanh đậm hơn khi được chọn */
    }

    input[type="radio"]:checked+.deactive-label {
        color: rgb(180, 20, 20);
        /* Màu xám đậm hơn khi được chọn */
    }
</style>
@extends('admin.layouts.master')
@section('title', 'Form thêm mới sản phẩm')
@section('content')
    <div class="content-body" style="min-height: 876px;">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Thêm mới sản phẩm!</h4>
                        <p class="mb-0">Your business dashboard template</p>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Components</a></li>
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
                <div class="col-xl-12 col-xxl-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row mb-4">
                            <!-- Tên sản phẩm -->
                            <div class="col-sm-6">
                                <label for="name" class="text-muted">Product Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}"
                                    placeholder="Enter product name">
                            </div>

                            <!-- Ảnh sản phẩm -->
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <label for="image" class="text-muted">Product Image</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Upload</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input">
                                        <label class="custom-file-label text-muted">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <!-- Mô tả sản phẩm -->
                            <div class="col-sm-6">
                                <label for="description" class="text-muted">Description</label>
                                <textarea class="form-control" name="description" placeholder="Enter product description">{{ old('description') }}</textarea>
                            </div>

                            <!-- Giá sản phẩm -->
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <label for="price" class="text-muted">Price</label>
                                <input type="number" step="0.01" class="form-control" name="price"
                                    value="{{ old('price') }}" placeholder="Enter product price">
                            </div>
                        </div>

                        <div class="row mb-4">
                            <!-- Số lượng sản phẩm -->
                            <div class="col-sm-6">
                                <label for="quantity" class="text-muted">Quantity</label>
                                <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}"
                                    placeholder="Enter product quantity">
                            </div>

                            <!-- Tên danh mục -->
                            <div class="col-sm-6 mt-2 mt-sm-0">
                                <label for="category_name" class="text-muted">Category</label>
                                <div class="form-group">
                                    <select class="form-control" name="category_id" id="sel1">
                                        <option value="" selected disabled>choose category</option>
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->id }}"
                                                {{ old('category_id') == $cate->id ? 'selected' : '' }}>
                                                {{ $cate->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <!-- Trạng thái Active -->
                            <div class="col-sm-6">
                                <label for="active" class="text-muted">Active Status</label>
                                <div class="form-group">
                                    <label class="radio-inline">
                                        <input type="radio" value="1" name="active"
                                            {{ old('active') == 1 ? 'checked' : '' }}>
                                        <span class="active-label">Active</span>
                                    </label>
                                    <label class="radio-inline ml-2">
                                        <input type="radio" value="0" name="active"
                                            {{ old('active') == 0 ? 'checked' : '' }}>
                                        <span class="deactive-label">Deactive</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Nút lưu sản phẩm -->
                        <button type="submit" class="btn btn-success">Save <span class="btn-icon-right"><i
                                    class="fa fa-check"></i></span></button>
                        <a href="{{ route('products.index') }}" class="btn btn-dark">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
