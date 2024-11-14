
@extends('auth.layout')
@section('title', 'sửa thông tin cá nhân')
@section('content')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('auth.update.account') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="fullname">Họ và tên</label>
                <input type="text" class="form-control" id="fullname" name="fullname" value="{{ Auth::user()->fullname }}">
            </div>

            <div class="form-group mb-3">
                <label for="username">Tên người dùng</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="{{ Auth::user()->username }}">
            </div>

            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}">
            </div>

            @if (Auth::user()->avatar && Storage::exists(Auth::user()->avatar))
                <img src="{{ Storage::url(Auth::user()->avatar) }}"alt="User Avatar" class="avatar-preview"
                    style="border-radius: 50%; width: 100px; height: 100px;">
            @else
                <img src="https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2023/02/hinh-avatar-anh-dai-dien-FB-mac-dinh.jpg?ssl=1"
                    alt="User Avatar" class="avatar-preview" style="border-radius: 50%; width: 100px; height: 100px;">
            @endif
            <div class="form-group mb-3">
                <br>
                <label for="avatar">Avatar</label>
                <input type="file" class="form-control-file" id="avatar" name="avatar">
                <small class="form-text text-muted">Chọn ảnh đại diện (tùy chọn)</small>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật thông tin</button>
            <a href="{{ route('dashboard') }}" class="btn btn-dark">Back</a>
        </form>
    </div>
@endsection
