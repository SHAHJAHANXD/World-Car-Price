@extends('admin.layout')
@section('title')
Admin | All Products
@endsection
@section('extra-heads')
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection
@section('content')
<style>
    .card-img-top {
        width: 280px;
        height: 200px;
    }

</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>False Ceiling</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">False Ceiling</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row" style="    text-align: end; margin-bottom: 10px;">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                        Add Ceiling
                    </button>
                </div>
            </div>
            <div class="row">
                @foreach ($Products as $product)
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 col-lg-4">
                    @php
                    $images = \App\Models\FalseCeilingImages::where('false_id', $product->id)->first();
                    @endphp
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $images->Image }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Title: <b>{{ $product->title }}</b></p>
                            <p class="card-text">Category: <b>False Ceiling</b></p>
                            <form method="POST" action="{{ route('admin.DeleteFalseCeiling', $product->id) }}">
                                @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New False Ceiling</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.PostFalseCeiling') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="name">False Ceiling Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter False Ceiling Title">
                    @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                    <label for="name">False Ceiling Images</label>
                    <input required type="file" class="form-control" name="Image[]" multiple>
                    @if ($errors->has('Image'))
                    <span class="text-danger">{{ $errors->first('Image') }}</span>
                    @endif
                    <div class="div" style="margin-top: 20px; ">
                        <button type="submit" class="btn btn-primary form-control">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('extra-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`
                , text: "If you delete this, it will be gone forever."
                , icon: "warning"
                , buttons: true
                , dangerMode: true
            , })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });

</script>
@endsection