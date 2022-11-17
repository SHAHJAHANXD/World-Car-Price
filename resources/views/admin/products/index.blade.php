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
                    <h1>Products DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="    text-align: end; margin-bottom: 10px;">
                <div class="col-12">
                    <a href="{{ route('admin.new_product') }}" class="btn btn-success">Add New Product</a>
                </div>
            </div>
            <div class="row">
                @foreach ($Products as $product)
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 col-lg-4">
                    @php
                    $category = \App\Models\category::where('id', $product->Category)->first();
                    $images = \App\Models\Images::where('product_id', $product->id)->first();
                    @endphp
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="{{ $images->Image }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">Title: <b>{{ $product->Title }}</b></p>
                            <p class="card-text">Category: <b>{{ $category->category_name }}</b></p>
                            <p class="card-text">Model: <b>{{ $product->Year }}</b></p>

                          <form method="POST" action="{{ route('admin.deleteproducts1', $product->id) }}">
                            @csrf
                            <input name="_method" type="hidden" value="DELETE">
                            <div class="row">
                                <div class="col-3 text-center">
                                    <a class="btn btn-primary" onclick="return confirm('Are you sure? You want to edit this record?')" href="/administrator/edit-category/{{ $product->id }}">Edit</a>
                                </div>
                                <div class="col-4 text-center">
                                    <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                </div>
                                @if (Auth::user()->role == 'Admin')
                                @if ($product->status == 1)
                                <div class="col-4 text-center">
                                    <a href="{{ route('admin.blockproducts1', $product->id) }}" class="btn btn-danger">Block</a>
                                </div>
                                @else
                                <div class="col-4 text-center">
                                    <a href="{{ route('admin.activeproducts1', $product->id) }}" class="btn btn-success">Active</a>
                                </div>
                                @endif
                                @endif
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
@endsection
@section('extra-scripts')
<script src="{{ asset('admin') }}/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{ asset('admin') }}/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true
            , "lengthChange": false
            , "autoWidth": false
            , "buttons": ["copy", "csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true
            , "lengthChange": false
            , "searching": false
            , "ordering": true
            , "info": true
            , "autoWidth": false
            , "responsive": true
        , });
    });

</script>
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
