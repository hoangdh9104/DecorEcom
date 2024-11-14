@extends('admin.layouts.master')
@section('title', 'Danh sách người dùng')
@section('content')
    <div class="content-body" style="min-height: 876px;">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
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
                            <h4 class="card-title">Danh sách người dùng</h4>
                            <a href="{{ route('users.create') }}">
                                <button type="button" class="btn btn-primary">Thêm mới thành viên<span
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
                                            <th scope="col">FullName</th>
                                            <th scope="col">Avatar</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Active</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->fullname }}</td>
                                                <td>
                                                    {{-- todo avatar --}}
                                                    {{-- nếu $user->avatar có tồn tại giá trị thì ta hiển thị ảnh  --}}
                                                    @if (!empty($user->avatar) && Storage::exists($user->avatar))
                                                        <img src="{{ Storage::url($user->avatar) }}" width="100px"
                                                            alt="">
                                                        {{-- {{ Storage::url($user->avatar) }} trong Laravel được sử dụng để tạo ra một URL công khai
                                                        từ một file đã được lưu trữ bằng hệ thống Storage của Laravel --}}
                                                    @else
                                                        <img src="https://i0.wp.com/thatnhucuocsong.com.vn/wp-content/uploads/2023/02/hinh-avatar-anh-dai-dien-FB-mac-dinh.jpg?ssl=1"
                                                            alt="User Avatar" class="avatar-preview"
                                                            style="border-radius: 50%; width: 100px">
                                                    @endif

                                                </td>
                                                <td>
                                                    @if ($user->role === 'admin')
                                                        <span class="badge badge-warning">{{ $user->role }}</span>
                                                    @else
                                                        <span class="badge badge-primary">{{ $user->role }}</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->active)
                                                        <span class="badge badge-success">Yes</span>
                                                    @else
                                                        <span class="badge badge-danger">No</span>
                                                    @endif
                                                </td>
                                                {{-- todo action --}}
                                                <td>
                                                    {{-- admin thì được kích hoạt sẵn, không cho phép tắt, khong duoc phep xoa --}}
                                                    <span class="btn-group">
                                                        <a class="btn btn-info btn-sm"
                                                            href="{{ route('users.show', $user) }}">Show</a>
                                                        @if ($user->role === 'member')
                                                            <form action="{{ route('users.destroy', $user) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="active" value="0">
                                                                <button onclick=" return confirm('are you sure ?') "
                                                                    class="btn btn-danger btn-sm"
                                                                    type="submit">Delete</button>
                                                            </form>
                                                            {{-- nếu chưa được kích hoạt thì show form kích hoạt --}}
                                                            @if ($user->active)
                                                                <form action="{{ route('users.deactive', $user) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="active" value="0">
                                                                    <button onclick=" return confirm('are you sure ?') "
                                                                        class="btn btn-warning btn-sm"
                                                                        type="submit">deactivated</button>
                                                                </form>
                                                            @else
                                                                <form action="{{ route('users.active', $user) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    @method('PUT')
                                                                    <input type="hidden" name="active" value="1">
                                                                    <button class="btn btn-success btn-sm"
                                                                        type="submit">activate</button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                        <a class="btn btn-secondary btn-sm"
                                                        href="{{ route('users.edit', $user) }}">Edit</a>
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
