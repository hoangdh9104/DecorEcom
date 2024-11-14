@extends('admin.layouts.master')
@section('title', 'Chi tiết thể loại')
@section('content')
    <div class="content-body" style="min-height: 876px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Thể loại : {{ $category->name }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- category Info -->
                                <div class="col-md-8">
                                    <ul class="list-group text-muted">
                                        <li class="list-group-item">
                                            <strong>Name:</strong> {{ $category->name }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Slug:</strong> {{ $category->slug }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Description:</strong> {{ $category->description }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Created At:</strong> {{ $category->created_at }}
                                        </li>
                                        <li class="list-group-item">
                                            <strong>Updated At:</strong> {{ $category->updated_at }}
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
