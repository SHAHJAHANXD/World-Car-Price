@extends('admin.layout')
@section('title')
Admin | Edit Category
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
                    <h1>Edit Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Category</li>
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
                            <h3 class="card-title">All Category</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.post_edit_categories') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="text" name="id" value="{{ $id }}" hidden>
                                <label for="name">Edit Category name</label>
                                <input type="text" class="form-control" id="name" value="{{ $category->category_name }}" name="category_name" placeholder="Enter Category Name">
                                @if ($errors->has('category_name'))
                                <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                @endif
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="file">Edit Category Image</label>
                                        <input type="file" name="category_image" class="form-control" id="file" multiple>
                                    </div>
                                    <div class="col-lg-6" style="text-align: center; margin-top: 20px;">
                                        <img src="{{$category->category_image; }}" style="border-radius: 100px; width: 130px; height: 130px;" alt="User Image">
                                    </div>
                                </div>
                                @if ($errors->has('category_image'))
                                <span class="text-danger">{{ $errors->first('category_image') }}</span>
                                @endif
                                <div class="row">
                                    <div class="col-12">

                                    </div>
                                </div>
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
