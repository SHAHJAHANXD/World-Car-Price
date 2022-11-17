@extends('admin.layout')
@section('title')
Admin | All FalseCeiling
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
                    <h1>FalseCeiling DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">FalseCeiling DataTables</li>
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
                            <h3 class="card-title">All FalseCeiling DataTable</h3>
                            {{-- <div class="card-body" style="text-align: end;">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                    Add FalseCeiling
                                </button>
                            </div> --}}
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">FalseCeiling Id</th>
                                        <th class="text-center">FalseCeiling Name</th>
                                        <th class="text-center">FalseCeiling Status</th>
                                        <th class="text-center">FalseCeiling Actions</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($FalseCeiling as $FalseCeiling)
                                    <tr>
                                        <td class="text-center">{{ $FalseCeiling->id }}</td>
                                        <td class="text-center">{{ $FalseCeiling->FalseCeiling_name }}</td>
                                        @if ($FalseCeiling->FalseCeiling_status == 1)
                                        <td class="text-center">
                                            <a class="btn btn-success">Active</a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a class="btn btn-danger">Blocked</a>
                                        </td>
                                        @endif
                                        @if ($FalseCeiling->FalseCeiling_status == 1)
                                        <td class="text-center">
                                            <a href="{{ route('admin.blockFalseCeiling', $FalseCeiling->id) }}" class="btn btn-danger">Block</a>
                                        </td>
                                        @else
                                        <td class="text-center">
                                            <a href="{{ route('admin.activeFalseCeiling', $FalseCeiling->id) }}" class="btn btn-success">Active</a>
                                        </td>
                                        @endif
                                        {{-- <td class="text-center">

                                            <form method="POST" action="{{ route('admin.deletefalse_ceiling', $FalseCeiling->id) }}">
                                                @csrf
                                                <input name="_method" type="hidden" value="DELETE">
                                                <a class="btn btn-primary" onclick="return confirm('Are you sure? You want to edit this record?')" href="/administrator/edit-FalseCeiling/{{ $FalseCeiling->id }}">Edit</a>
                                                <button type="submit" class="btn btn-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>

                                        </td> --}}
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
                <h4 class="modal-title">New FalseCeiling</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.post_false_ceiling') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label for="name">FalseCeiling name</label>
                    <input type="text" class="form-control" id="name" name="FalseCeiling_name" placeholder="Enter FalseCeiling Name">
                    @if ($errors->has('FalseCeiling_name'))
                    <span class="text-danger">{{ $errors->first('FalseCeiling_name') }}</span>
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
