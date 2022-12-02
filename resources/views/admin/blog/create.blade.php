@extends('admin.layout')
@section('title')
    Admin | Blog
@endsection
@section('extra-heads')
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed"
            , theme: "monokai"
        });

    </script>
@endsection
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Blog</li>
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
                                <h3 class="card-title">Create Blog</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('blog.post_blog') }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title"
                                        placeholder="Enter Blog Title">
                                    @if ($errors->has('title'))
                                        <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                    <label for="slug">Slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        placeholder="Enter Blog Slug">
                                    @if ($errors->has('slug'))
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    @endif
                                    <label for="name">Category</label>
                                    <select name="category" id="" class="form-control">
                                        <option value="" selected>Select</option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category'))
                                        <span class="text-danger">{{ $errors->first('category') }}</span>
                                    @endif
                                    <label for="name">Thumbnail Image</label>
                                    <input type="file" class="form-control" id="name" name="thumb_image"
                                        placeholder="Enter Category Name">
                                    @if ($errors->has('thumb_image'))
                                        <span class="text-danger">{{ $errors->first('thumb_image') }}</span>
                                    @endif
                                    <label for="">Description</label>
                                    <textarea class="summernote" name="desciption"></textarea>
                                    @if ($errors->has('desciption'))
                                    <span class="text-danger">{{ $errors->first('desciption') }}</span>
                                    @endif
                                    <label for="name">Meta Title</label>
                                    <input type="text" class="form-control" id="name" name="meta_title"
                                        placeholder="Enter Meta Title">
                                    @if ($errors->has('meta_title'))
                                        <span class="text-danger">{{ $errors->first('meta_title') }}</span>
                                    @endif
                                    <label for="name">Meta Keyword</label>
                                    <input type="text" class="form-control" id="name" name="meta_keyword"
                                        placeholder="Enter Meta Keyword">
                                    @if ($errors->has('meta_keyword'))
                                        <span class="text-danger">{{ $errors->first('meta_keyword') }}</span>
                                    @endif
                                    <label for="name">Meta Description</label>
                                    <textarea type="text" class="form-control" id="name" name="meta_description"
                                        placeholder="Enter Meta Description">
                                    </textarea>
                                    @if ($errors->has('meta_description'))
                                        <span class="text-danger">{{ $errors->first('meta_description') }}</span>
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
