@extends('auth.layout')
@section('title', 'đổi mật khẩu')
@section('content')
    <div class="container">
        <form action="{{ route('auth.changed.password') }}" method="POST">
            @csrf
            @method('PUT')

            <div class="container mt-5">
                <div class="row justify-content-center">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="col-md-6">
                        <h2>Đổi mật khẩu</h2>

                        <!-- Mật khẩu hiện tại -->
                        <div class="form-group mb-3">
                            <label for="current_password">Mật khẩu hiện tại</label>
                            <input type="password" class="form-control" required id="current_password"
                                name="current_password">
                        </div>
                        <!-- Mật khẩu mới -->
                        <div class="form-group mb-3">
                            <label for="new_password">Mật khẩu mới</label>
                            <input type="password" class="form-control" value="{{ old('new_password') }}" id="new_password"
                                name="new_password">
                        </div>
                        <!-- Xác nhận mật khẩu mới -->
                        <div class="form-group mb-3">
                            <label for="new_password_confirmation">Xác nhận mật khẩu mới</label>
                            <input type="password" class="form-control" value="{{ old('confirm_password') }}"
                                id="new_password_confirmation" name="confirm_password">
                        </div>
                        <!-- Nút submit -->
                        <button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-dark">Back</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
