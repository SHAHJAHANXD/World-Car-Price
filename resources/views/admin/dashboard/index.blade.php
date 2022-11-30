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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">All Users DataTable</h3>
                                    <div class="card-body" style="text-align: end;">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                            Add New User
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Id</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Role</th>
                                                <th class="text-center">Account Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $users)
                                            <tr>
                                                <td class="text-center">{{ $users->id }}</td>
                                                <td class="text-center">
                                                    @if ($users->profile_image == true)
                                                    <img src="{{ $users->profile_image }}" style="border-radius: 100px; width: 50px; height: 50px;" alt="User Image">
                                                    @else
                                                    <img src="{{ asset('images/guest.png') }}" style="border-radius: 100px; width: 50px; height: 50px;" alt="User Image">
                                                    @endif
                                                </td>
                                                <td class="text-center">{{ $users->name }}</td>
                                                <td class="text-center">{{ $users->email }}</td>
                                                <td class="text-center">{{ $users->role }}</td>

                                                @if ($users->status == 1)
                                                <td class="text-center">
                                                    <a class="btn btn-success">Active</a>
                                                </td>
                                                @else
                                                <td class="text-center">
                                                    <a class="btn btn-danger">Blocked</a>
                                                </td>
                                                @endif
                                                @if ($users->status == 1)
                                                <td class="text-center">
                                                    <a href="{{ route('admin.edit_users', $users->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('admin.blockuser', $users->id) }}" class="btn btn-danger">Block</a>
                                                </td>
                                                @else
                                                <td class="text-center">
                                                    <a href="{{ route('admin.edit_users', $users->id) }}" class="btn btn-primary">Edit</a>
                                                    <a href="{{ route('admin.activeuser', $users->id) }}" class="btn btn-success">Active</a>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
@endsection
