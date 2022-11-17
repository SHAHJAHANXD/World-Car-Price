@extends('admin.layout')
@section('title')
Admin | All Users
@endsection
@section('extra-heads')
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
                    </ol>
                </div>
            </div>
            <div class="row" style="justify-content: center">
                <div class="col-lg-6" style="    background: white;
                padding: 40px;
                border-radius: 10px;">
                    <form action="{{ route('admin.save_edit_users') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <input type="text" hidden name="id" value="{{ $id }}" id="">
                        <label>Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Enter Name">
                        @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif
                        <label>Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Enter Email">
                        @if ($errors->has('email'))
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                        @endif
                        <label>Role</label>
                        <select name="role" id="" class="form-control">

                            <option value="{{ $user->role }}">{{ $user->role }}</option>
                            @if ($user->role == 'Admin')
                            <option value="Staff">Satff</option>
                            @else
                            <option value="Staff" selected>Satff</option>
                            <option value="Admin">Admin</option>
                            @endif
                            @if ($user->role == 'Staff')
                            <option value="Admin">Admin</option>
                            @endif

                        </select>
                        @if ($errors->has('role'))
                        <span class="text-danger">{{ $errors->first('role') }}</span>
                        @endif
                        <label>Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                        @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif
                        <div class="div" style="margin-top: 20px; ">
                            <button type="submit" class="btn btn-primary form-control">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection
