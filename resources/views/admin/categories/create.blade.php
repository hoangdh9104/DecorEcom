
@extends('admin.layouts.master')
@section('title', 'Form thêm mới thể loại')
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
                    <form class="p-4 shadow-lg rounded bg-light w-50 mx-auto " action="{{ route('categories.store') }}"
                        method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" name="name"
                                id="exampleFormControlInput1" placeholder="Enter name">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Description</label>
                            <textarea cols="30" rows="10" class="form-control" name="description" id="exampleFormControlInput1"
                                placeholder="Enter description">{{ old('description') }}</textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Save</button>
                        <a class="btn btn-dark" href="{{ route('categories.index') }}">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
