@extends('admin.layouts.master')
@section('title', 'create an account')
@section('content')
    <div class="content-body" style="min-height: 876px;">
        <div class="container-fluid text-muted">
            {{-- form  --}}
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm mới thành viên</h4>
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
                            <form action="{{ route('users.store') }}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row mb-4">
                                    <!-- Tên đầy đủ -->

                                    <div class="col-sm-6">
                                        <label for="avatar text-muted">Fullname</label>
                                        <input type="text" class="form-control" name="fullname" value="{{old('fullname')}}"
                                            placeholder="Enter fullname">
                                    </div>
                                    <!-- Tên người dùng -->

                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <label for="avatar text-muted">Username</label>
                                        <input type="text" class="form-control" name="username" value="{{old('username')}}"
                                            placeholder="Enter username">
                                    </div>
                                </div>
                                <div class="row mb-4">
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
                                    {{-- Vai tro --}}
                                    <div class="col-sm-6 mt-2 mt-sm-0">
                                        <label for="avatar" class="text-muted">Role</label>
                                        <div class="form-group">
                                            <select class="form-control" value="{{old('role')}}" name="role" id="sel1">
                                                <option value="member">member</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <!-- Mật khẩu -->
                                    <div class="col-sm-6">
                                        <label for="avatar" class="text-muted">Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter Password">
                                    </div>
                                    <!-- Xác nhận mật khẩu -->
                                    <div class="col-sm-6">
                                        <label for="avatar" class="text-muted">Confirm password</label>
                                        <input type="password" class="form-control" name="confirm_password"
                                            placeholder="Confirm password">
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <!-- Email -->
                                    <div class="col-sm-6">
                                        <label for="avatar" class="text-muted">Email</label>
                                        <input type="email" class="form-control" value="{{old('email')}}"  name="email" placeholder="Email">
                                    </div>
                                    {{-- acitve --}}
                                    {{-- <div class="col-sm-6 mt-2 mt-sm-0">
                                    <label for="avatar">Active</label>
                                    <div class="form-group">
                                        <label class="radio-inline">
                                            <input type="radio" value="1" name="active">Active</label>
                                        <label class="radio-inline">
                                            <input type="radio" value="0" name="active">Deactive</label>
                                    </div>
                                </div> --}}
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
