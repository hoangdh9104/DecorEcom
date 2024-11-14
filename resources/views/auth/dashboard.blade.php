@extends('auth.layout')
@section('title', 'dashboard')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }

        .dashboard-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            margin-top: 50px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-header h2 {
            font-size: 2rem;
            font-weight: 600;
        }

        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 25px;
            padding: 10px 30px;
            font-size: 1rem;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
    <div class="container">
        <div class="dashboard-container">
            <div class="profile-header">
                <h2>Thông tin cá nhân</h2>
                {{-- hiển thị hình ảnh --}}
                {{-- nếu có ảnh thì hiển thị --}}
                @if (Auth::user()->avatar && Storage::exists(Auth::user()->avatar))
                    <img src="{{ Storage::url(Auth::user()->avatar) }}"alt="User Avatar" class="avatar-preview"
                        style="border-radius: 50%; width: 100px; height: 100px;">
                @else
                    <img src="https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2023/02/hinh-avatar-anh-dai-dien-FB-mac-dinh.jpg?ssl=1"
                        alt="User Avatar" class="avatar-preview" style="border-radius: 50%; width: 100px; height: 100px;">
                @endif
            </div>

            <table class="table table-bordered">
                <tbody>
                    {{-- Auth::user() là một phương thức trong Laravel
                        được sử dụng để lấy thông tin của người dùng hiện tại đã đăng nhập vào ứng dụng. Khi một người dùng đăng nhập,
                        Laravel lưu thông tin của họ trong phiên (session),
                        và bạn có thể truy cập thông tin đó bằng cách sử dụng Auth::user(). --}}
                    <tr>
                        <th scope="row">Họ và tên</th>
                        <td>{{ Auth::user()->fullname }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Tên người dùng</th>
                        <td>{{ Auth::user()->username }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Email</th>
                        <td>{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Vai trò</th>
                        <td>
                            @if (Auth::user()->role === 'admin')
                                <span class="badge bg-warning">{{ Auth::user()->role }}</span>
                            @else
                                <span class="badge bg-secondary">{{ Auth::user()->role }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>
                            @if (Auth::user()->active)
                                <span class="badge bg-primary">Active</span>
                            @else
                                <span class="badge bg-danger">Deactive</span>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center mt-4">
                <a href="{{ route('auth.edit.account') }}" class="btn btn-info">Chỉnh sửa thông tin cá nhân</a>
                <a href="{{ route('auth.change.password') }}" class="btn btn-warning">Đổi mật khẩu</a>
                @if (Auth::user()->role === 'admin')
                    <a href="{{ route('dashboard.admin') }}" class="btn btn-success">Trang Quản Trị</a>
                @endif
            </div>
        </div>
    </div>
@endsection
