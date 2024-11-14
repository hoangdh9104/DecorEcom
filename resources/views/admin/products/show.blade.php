@extends('admin.layouts.master')
@section('title', 'Chi tiết sản phẩm')
@section('content')
    <div class="content-body" style="min-height: 876px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thể loại : {{ $product->name }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Product Info -->
                                <div class="col-md-8">
                                    <ul class="list-group text-muted">
                                        <li class="list-group-item">
                                            <strong>Name:</strong> {{ $product->name }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Image:</strong>
                                            {{-- todo image --}}
                                            @if (!empty($product->image) && Storage::exists($product->image))
                                                <img src="{{ Storage::url($product->image) }}" class="img-fluid"
                                                    style="max-width: 200px;" alt="">
                                                {{-- {{ Storage::url($user->avatar) }} trong Laravel được sử dụng để tạo ra một URL công khai
                                        từ một file đã được lưu trữ bằng hệ thống Storage của Laravel --}}
                                            @else
                                                <img src="https://t3.ftcdn.net/jpg/05/04/28/96/360_F_504289605_zehJiK0tCuZLP2MdfFBpcJdOVxKLnXg1.jpg"
                                                    alt="User Avatar" class="avatar-preview"
                                                    style="border-radius: 50%; width: 100px">
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Slug:</strong> {{ $product->slug }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Description:</strong> {{ $product->description }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Price:</strong> {{ number_format($product->price, 2) }} VND
                                            <!-- Hiển thị giá với 2 số lẻ -->
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Quantity:</strong> {{ $product->quantity }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Views:</strong> {{ $product->views }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Category:</strong>
                                            {{ optional($product->category)->name ?: 'No Category' }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Active:</strong> {{ $product->active ? 'Yes' : 'No' }}
                                            <!-- Hiển thị Yes hoặc No dựa trên giá trị active -->
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Created At:</strong> {{ $product->created_at->format('d-m-Y H:i:s') }}
                                            <!-- Định dạng thời gian -->
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Updated At:</strong> {{ $product->updated_at->format('d-m-Y H:i:s') }}
                                            <!-- Định dạng thời gian -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-end">
                            <a href="{{ route('categories.index') }}" class="btn btn-dark">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
