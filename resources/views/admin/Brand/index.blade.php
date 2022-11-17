@extends('admin.layout')
@section('title')
Admin | All Brand
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
                    <h1>Brand DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Brand DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">All Brand DataTable</h3>
                            <div class="card-body" style="text-align: end;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                    Add Brand
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Brand Id</th>
                                        <th class="text-center">Brand Category</th>
                                        <th class="text-center">Brand Name</th>
                                        <th class="text-center">Brand Status</th>
                                        <th class="text-center">Brand Actions</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Brand as $Brand)
                                    <tr>
                                        <td class="text-center">{{ $Brand->id }}</td>
                                        <td class="text-center">{{ $Brand->Brand_category }}</td>
                                        <td class="text-center">{{ $Brand->Brand_name }}</td>
                                        @if ($Brand->Brand_status == 1)
                                        <td class="text-center">
                                            <a class="btn btn-success">Active</a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a class="btn btn-danger">Blocked</a>
                                        </td>
                                        @endif
                                        @if ($Brand->Brand_status == 1)
                                        <td class="text-center">
                                            <a href="{{ route('admin.blockBrand', $Brand->id) }}" class="btn btn-danger">Block</a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a href="{{ route('admin.activeBrand', $Brand->id) }}" class="btn btn-success">Active</a>
                                        </td>
                                        @endif
                                        <td class="text-center">

                                            <form method="POST" action="{{ route('admin.deletebrands', $Brand->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a class="btn btn-primary" onclick="return confirm('Are you sure? You want to edit this record?')" href="/administrator/edit-brands/{{ $Brand->id }}">Edit</a>
                                                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>

                                        </td>
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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Brand</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.post_brands') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="">
                        Choose Brand Category
                    </label>
                    <select name="Brand_category" id="" class="form-control">
                        <option value="">Choose Category</option>
                        @foreach ($category as $category)
                        <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                    <div class="div">
                        @if ($errors->has('Brand_category'))
                    <span class="text-danger">{{ $errors->first('Brand_category') }}</span>
                    @endif
                    </div>
                    <label for="name">Brand name</label>
                    <input type="text" class="form-control" id="name" name="Brand_name" placeholder="Enter Brand Name">
                   <div class="div">
                    @if ($errors->has('Brand_name'))
                    <span class="text-danger">{{ $errors->first('Brand_name') }}</span>
                    @endif
                   </div>

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
