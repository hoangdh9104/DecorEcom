@extends('client.layouts.master')
@section('title', 'register')
@section('content')
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h3 class="text-center mt-5">Register</h3>
                <form action="{{ route('post.register') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="fullname" class="form-label">Full Name</label>
                        <input type="text" class="form-control" name="fullname" id="fullname"
                            placeholder="Enter your full name">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" name="username" id="username"
                            placeholder="Enter your username">
                    </div>
                    <div class="mb-3">
                        <label for="inputAddress" class="col-4 col-form-label">Avatar</label>
                        <div class="col-8">
                            <input type="file" class="form-control" name="avatar" id="inputAddress" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" name="email" id="email"
                            placeholder="Enter your email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password"
                            placeholder="Enter your password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" id="confirmPassword"
                            placeholder="Confirm your password">
                    </div>
                    <button type="submit" class="btn btn-primary">Register</button>
                    <a href="{{ route('login') }}" class="btn btn-info">Login</a>
                </form>
            </div>
        </div>
    </div> --}}
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-lg">
            <!-- Thông báo lỗi -->
            @if ($errors->any())
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Tiêu đề -->
            <h3 class="text-2xl font-semibold text-center mb-6">Register</h3>

            <!-- Form -->
            <form action="{{ route('post.register') }}" method="post" enctype="multipart/form-data">
                @csrf

                <!-- Tên đầy đủ -->
                <div class="mb-4">
                    <label for="fullname" class="block text-gray-700 font-medium mb-2">Full Name</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Enter your full name"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Tên người dùng -->
                <div class="mb-4">
                    <label for="username" class="block text-gray-700 font-medium mb-2">Username</label>
                    <input type="text" name="username" id="username" placeholder="Enter your username"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Ảnh đại diện -->
                <div class="mb-4">
                    <label for="avatar" class="block text-gray-700 font-medium mb-2">Avatar</label>
                    <input type="file" name="avatar" id="avatar"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Email -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 font-medium mb-2">Email address</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Mật khẩu -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 font-medium mb-2">Password</label>
                    <input type="password" name="password" id="password" placeholder="Enter your password"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Xác nhận mật khẩu -->
                <div class="mb-6">
                    <label for="confirmPassword" class="block text-gray-700 font-medium mb-2">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirmPassword" placeholder="Confirm your password"
                        class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>

                <!-- Nút đăng ký -->
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white p-3 rounded font-semibold">
                    Register
                </button>

                <!-- Nút đăng nhập -->
                <a href="{{ route('login') }}"
                    class="w-full text-center block mt-4 text-blue-500 hover:underline font-medium">Already have an account?
                    Login</a>
            </form>
        </div>
    </div>
@endsection
