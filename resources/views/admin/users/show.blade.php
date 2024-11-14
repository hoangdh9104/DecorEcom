<style>
    .password-field {
        font-family: 'Courier New', monospace;
        letter-spacing: 3px;
    }
</style>
@extends('admin.layouts.master')
@section('title', 'Detail account')
@section('content')
    <div class="content-body" style="min-height: 876px;">
        <div class="container-fluid text-muted">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Details : {{ $user->fullname }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Avatar -->
                                <div class="col-md-4 text-center mb-4">
                                    @if (!empty($user->avatar) && Storage::exists($user->avatar))
                                        <img src="{{ Storage::url($user->avatar) }}" width="150px" height="200px"
                                            alt="">
                                        {{-- {{ Storage::url($user->avatar) }} trong Laravel được sử dụng để tạo ra một URL công khai
                                từ một file đã được lưu trữ bằng hệ thống Storage của Laravel --}}
                                    @else
                                        <img src="https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2023/02/hinh-avatar-anh-dai-dien-FB-mac-dinh.jpg?ssl=1"
                                            alt="User Avatar" class="avatar-preview"
                                            style="border-radius: 50%; width: 150px">
                                    @endif
                                </div>

                                <!-- User Info -->
                                <div class="col-md-8">
                                    <ul class="list-group">
                                        <li class="list-group-item">
                                            <strong>Full Name:</strong> {{ $user->fullname }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Username:</strong> {{ $user->username }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Email:</strong> {{ $user->email }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Password:</strong> ************
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Role:</strong>
                                            @if ($user->role === 'admin')
                                                <span class="badge badge-warning">{{ $user->role }}</span>
                                            @else
                                                <span class="badge badge-primary">{{ $user->role }}</span>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Active:</strong>
                                            @if ($user->active)
                                                <span class="badge badge-success">Yes</span>
                                            @else
                                                <span class="badge badge-danger">No</span>
                                            @endif
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Created At:</strong> {{ $user->created_at }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Updated At:</strong> {{ $user->updated_at }}
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <a href="{{ route('users.edit', $user) }}" class="btn btn-outline-warning">Edit User</a>
                            <a href="{{ route('users.index') }}" class="btn btn-dark">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
