@extends('admin.layout')
@section('title')
Admin | Dashboard
@endsection
@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">All Users</span>
                            <span class="info-box-number">{{ $users->count() }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Traffic</span>
                            <span class="info-box-number">
                                {{ $traffic->total_views }}
                            </span>
                        </div>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-12 col-sm-6 col-md-4">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Products</span>
                            <span class="info-box-number">{{ $products }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Latest Users</h3>
                                    <div class="card-tools">
                                        <span class="badge badge-danger">{{ $users->count() }} New Users</span>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <ul class="users-list clearfix">
                                        @foreach ($users as $users)
                                        <li>
                                            @if ($users->profile_image == true)
                                            <img src="{{ env('APP_URL').'images/users/'.$users->profile_image; }}" style="max-width: 70%;" alt="User Image">
                                            @else
                                            <img src="{{ asset('images/guest.png') }}" style="max-width: 70%;" alt="User Image">
                                            @endif
                                            <a class="users-list-name" href="#" style="font-size: 20px;font-weight: 600;">{{ $users->name }}</a>
                                            <span class="users-list-date">Joined: {{$users->created_at->diffForHumans()}}</span>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="card-footer text-center">
                                    <a href="javascript:">View All Users</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
