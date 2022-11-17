@extends('admin.layout')
@section('title')
Admin | All Products Requests
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
                    <h1> Products Requests DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products Requests DataTables</li>
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
                            <h3 class="card-title">All Products Requests DataTable</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">Product Id</th>
                                        <th class="text-center">Posted By User</th>
                                        <th class="text-center">Posted By User Email</th>
                                        <th class="text-center">Category</th>
                                        <th class="text-center">Brand</th>
                                        <th class="text-center">Title</th>
                                        <th class="text-center">Year</th>
                                        <th class="text-center">Body Type</th>
                                        <th class="text-center">Transmission Type</th>
                                        <th class="text-center">Drive Type</th>
                                        <th class="text-center">Fuel Type</th>
                                        <th class="text-center">Capacities</th>
                                        <th class="text-center">Doors</th>
                                        <th class="text-center">Short Description</th>
                                        <th class="text-center">Long Description</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach ($product as $product)
                                    <tr>
                                        <td class="text-center">{{ $product->id }}</td>
                                        <td class="text-center">{{ $product->user_name }}</td>
                                        <td class="text-center">{{ $product->user_email }}</td>
                                        <td class="text-center">{{ $product->Category_name }}</td>
                                        <td class="text-center">{{ $product->Brand }}</td>
                                        <td class="text-center">{{ $product->Title }}</td>
                                        <td class="text-center">{{ $product->Year }}</td>
                                        <td class="text-center">{{ $product->Body_type }}</td>
                                        <td class="text-center">{{ $product->Transmission_type }}</td>
                                        <td class="text-center">{{ $product->Drive_type }}</td>
                                        <td class="text-center">{{ $product->Fuel_type }}</td>
                                        <td class="text-center">{{ $product->Capacities }}</td>
                                        <td class="text-center">{{ $product->Doors }}</td>
                                        <td class="text-center">{{ $product->Short_Description }}</td>

                                        <td class="text-center"> <a href="{{ route('admin.products_description', $product->id) }}" target="_block">View</a></td>

                                        @if ($product->status == 1)
                                        <td class="text-center">
                                            <a class="btn btn-success">Active</a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a class="btn btn-danger">Blocked</a>
                                        </td>
                                        @endif
                                        @if ($product->status == 1)
                                        <td class="text-center">
                                            <a href="{{ route('admin.blockproducts1', $product->id) }}" class="btn btn-danger">Block</a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a href="{{ route('admin.activeproducts1', $product->id) }}" class="btn btn-success">Active</a>
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
@endsection
