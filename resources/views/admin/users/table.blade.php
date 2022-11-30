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
                    <h1>User DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">User DataTables</li>
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
                                        <th class="text-center">View Products</th>
                                        <th class="text-center">Account Status</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                 {{-- /products-requests-user --}}
                                <tbody>
                                    @foreach ($user as $users)
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
                                        <td class="text-center"><a href="/administrator/products-requests-user/{{ $users->id }}">View</a></td>

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
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.save_user') }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    <label>Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                    <label>Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                    <label>Role</label>
                    <select name="role" id="" class="form-control">
                        <option value="Staff" selected>Satff</option>
                        <option value="Manager" selected>Manager</option>
                        <option value="Admin">Admin</option>
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
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
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
@endsection
