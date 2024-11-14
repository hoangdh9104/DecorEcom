@extends('admin.layouts.master')
@section('title', 'edit an account')
@section('content')
    <div class="content-body" style="min-height: 876px;">
        <div class="container-fluid text-muted">
            {{-- form  --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thay đổi thông tin thành viên: {{ $user->fullname }}</h4>
                </div>
                <div class="card-body">
                    <div class="basic-form">
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
                            @if (session('message'))
                                <div class="alert alert-success alert-dismissible alert-alt solid fade show">
                                    <button type="button" class="close h-100" data-dismiss="alert"
                                        aria-label="Close"><span><i class="mdi mdi-close"></i></span>
                                    </button>
                                    <strong>Success!</strong> {{ session('message') }}.
                                </div>
                            @endif
                            <form action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data"
                                method="post">
                                @csrf
                                @method('PUT')
                                <div class="row mb-4">
                                    <!-- Tên đầy đủ -->
                                    <div class="col-sm-6">
                                        <label for="avatar text-muted">Fullname</label>
                                        <input type="text" class="form-control" name="fullname"
                                            value="{{ $user->fullname }}" placeholder="Enter fullname">
                                    </div>
                                    <!-- Tên người dùng -->

                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <label for="avatar text-muted">Username</label>
                                        <input type="text" class="form-control" name="username"
                                            value="{{ $user->username }}" placeholder="Enter username">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <!-- Email -->
                                    <div class="col-sm-6">
                                        <label for="avatar" class="text-muted">Email</label>
                                        <input type="email" class="form-control" value="{{ $user->email }}"
                                            name="email" placeholder="Email">
                                    </div>
                                    {{-- hiển thị ảnh --}}
                                    @if ($user->avatar && Storage::exists($user->avatar))
                                        <img src="{{ Storage::url($user->avatar) }}"alt="User Avatar" class="avatar-preview"
                                            style="border-radius: 50%; width: 100px; height: 100px;">
                                    @else
                                        <img src="https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2023/02/hinh-avatar-anh-dai-dien-FB-mac-dinh.jpg?ssl=1"
                                            alt="User Avatar" class="avatar-preview"
                                            style="border-radius: 50%; width: 100px; height: 100px;">
                                    @endif
                                    <!-- Ảnh đại diện -->
                                    <div class="col-sm-6">
                                        <label for="avatar text-muted">Avatar</label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                            <div class="custom-file">
                                                <input type="file" name="avatar" class="custom-file-input">
                                                <label class="custom-file-label text-muted">Choose file</label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- Nút đăng ký -->
                                <button type="submit" class="btn btn-success">Save <span class="btn-icon-right"><i
                                            class="fa fa-check"></i></span>
                                </button>
                                <a href="{{ route('users.index') }}" class="btn btn-dark">Back</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
