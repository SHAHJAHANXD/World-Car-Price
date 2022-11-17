@extends('admin.layout')
@section('title')
Admin | Edit Country
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
                    <h1>Edit Country</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Country</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="justify-content: center;">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Edit Country</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.post_edit_countries') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="text" name="id" value="{{ $id }}" hidden>
                                <label for="name">Edit Country Name</label>
                                <input type="text" class="form-control" id="name" value="{{ $Country->name }}" name="name" placeholder="Enter Country Name">
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                                <label for="rate">Edit Country Exchange Rate</label>
                                <input type="text" class="form-control" id="rate" value="{{ $Country->rate }}" name="rate" placeholder="Enter Country Exchnage Rate">
                                @if ($errors->has('rate'))
                                <span class="text-danger">{{ $errors->first('rate') }}</span>
                                @endif
                                <label for="symbol">Edit Country Symbol</label>
                                <input type="text" class="form-control" id="symbol" value="{{ $Country->symbol }}" name="symbol" placeholder="Enter Country Symbol">
                                @if ($errors->has('symbol'))
                                <span class="text-danger">{{ $errors->first('symbol') }}</span>
                                @endif
                                <div class="div" style="margin-top: 20px; ">
                                    <button type="submit" class="btn btn-primary form-control">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
