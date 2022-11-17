@extends('admin.layout')
@section('title')
Admin | All Products
@endsection
@section('extra-heads')
<link rel="stylesheet" href="{{ asset('admin/plugins/bs-stepper/css/bs-stepper.min.css') }}">
<script src="{{ asset('admin/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('admin') }}/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<script>
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

</script>
@endsection
@section('content')
<style>
    .step-trigger {
        padding: 0 !important;
    }

</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add New Products</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row" style="    justify-content: center;">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Product</h3>
                        </div>
                        <form action="{{ route('admin.post_products') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input required type="text" hidden name="Posted_By" value="{{ Auth::user()->id }}">
                            <div class="card-body">
                                <h2>Product Name</h2>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input required type="text" class="form-control" name="ProductName" placeholder="Enter Product Name">

                                </div>
                                <h2>Product Price</h2>
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input required type="text" class="form-control" name="ProductPrice" placeholder="Enter Product Price">

                                </div>

                                <h2>OverView</h2>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">OverView</label>
                                    <textarea required type="email" class="form-control" name="OverView" placeholder="Enter email">
                                    </textarea>
                                </div>
                                <h2>Product Category</h2>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Choose Category</label>
                                        <select required name="category" class="form-control">
                                            {{-- @foreach ($category as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                            @endforeach --}}
                                            <option value="Cars">Cars</option>
                                            <option value="Bikes">Bikes</option>
                                            <option value="Electric Cars">Electric Cars</option>
                                            <option value="Electric Bikes">Electric Bikes</option>
                                            <option value="BiCycles">BiCycles</option>
                                        </select>
                                    </div>
                                </div>
                                <h2>Product Images</h2>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>File input</label>
                                        <input required  type="file" class="form-control" name="file_images[]" multiple>
                                    </div>
                                </div>
                                <h2>Basic Info</h2>
                                <div class="form-group">
                                    <label>Brand</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Brand Name" name="Brand">
                                </div>
                                <div class="form-group">
                                    <label>Model Number</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Model Number" name="ModelNumber">
                                </div>
                                <div class="form-group">
                                    <label>Made In</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Made In" name="MadeIn">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select required name="Status" id="" class="form-control">
                                        <option value="Available">Available</option>
                                        <option value="Sold Out">Sold Out</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Release Year</label>
                                    <select required required name="ReleaseDate" id="" class="form-control">
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2027">2027</option>
                                        <option value="2028">2028</option>
                                        <option value="2029">2029</option>
                                        <option value="2030">2030</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Warranty</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Warranty" name="Warranty">
                                </div>
                                <div class="form-group">
                                    <label>Colors</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Colors" name="Colors">
                                </div>
                                <div class="form-group">
                                    <label>Body Type</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Body Type" name="BodyType">
                                </div>
                                <h2>Engine</h2>
                                <div class="form-group">
                                    <label>Engine Type</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Engine Type" name="EngineType">
                                </div>
                                <div class="form-group">
                                    <label>Displacement</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Displacement" name="Displacement">
                                </div>
                                <div class="form-group">
                                    <label>Cooling System</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Cooling System" name="CoolingSystem">
                                </div>
                                <div class="form-group">
                                    <label>Engine Power</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Engine Power" name="EnginePower">
                                </div>
                                <div class="form-group">
                                    <label>Torque</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Torque" name="Torque">
                                </div>
                                <div class="form-group">
                                    <label>Starter</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Starter" name="Starter">
                                </div>
                                <div class="form-group">
                                    <label>Bore x Stroke</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Bore x Stroke" name="BoreStroke">
                                </div>
                                <div class="form-group">
                                    <label>Compression Ratio</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Compression Ratio" name="CompressionRatio">
                                </div>
                                <div class="form-group">
                                    <label>No. Of Cylinders</label>
                                    <input required  type="text" class="form-control" placeholder="Enter No. Of Cylinders" name="NoOfCylinders">
                                </div>
                                <h2>Performance</h2>
                                <div class="form-group">
                                    <label>Transmission</label>
                                    <select name="Transmission" class="form-control">
                                        <option value="Automatic">Automatic</option>
                                        <option value="Manual">Manual</option>
                                    </select>
                                    {{-- <input required  type="text" class="form-control" placeholder="Enter Transmission" name="Transmission"> --}}
                                </div>
                                <div class="form-group">
                                    <label>Clutch</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Clutch" name="Clutch">
                                </div>
                                <div class="form-group">
                                    <label>Final Drive</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Final Drive" name="FinalDrive">
                                </div>
                                <div class="form-group">
                                    <label>Gear Box</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Gear Box" name="GearBox">
                                </div>
                                <div class="form-group">
                                    <label>Top Speed</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Top Speed" name="TopSpeed">
                                </div>
                                <h2>Suspensions</h2>
                                <div class="form-group">
                                    <label>Front Suspension</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Front Suspension" name="FrontSuspension">
                                </div>
                                <div class="form-group">
                                    <label>Rear Suspension</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Rear Suspension" name="RearSuspension">
                                </div>
                                <h2>
                                    Dimensions And Weight
                                </h2>
                                <div class="form-group">
                                    <label>Length</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Length" name="Length">
                                </div>
                                <div class="form-group">
                                    <label>Width</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Width" name="Width">
                                </div>
                                <div class="form-group">
                                    <label>Height</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Height" name="Height">
                                </div>
                                <div class="form-group">
                                    <label>Wheelbase</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Wheelbase" name="Wheelbase">
                                </div>
                                <div class="form-group">
                                    <label>Seat Height</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Seat Height" name="SeatHeight">
                                </div>
                                <div class="form-group">
                                    <label>Ground Clearance</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Ground Clearance" name="GroundClearance">
                                </div>
                                <div class="form-group">
                                    <label>Kurb Weight</label>
                                    <input required  type="text" class="form-control" placeholder="Enter KurbWeight" name="KurbWeight">
                                </div>
                                <div class="form-group">
                                    <label>Weight</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Weight" name="Weight">
                                </div>
                                <h2>Tires</h2>
                                <div class="form-group">
                                    <label>Tyre Front</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Tyre Front" name="TyreFront">
                                </div>
                                <div class="form-group">
                                    <label>Tyre Rear</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Tyre Rear" name="TyreRear">
                                </div>
                                <div class="form-group">
                                    <label>Front Wheel</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Front Wheel" name="FrontWheel">
                                </div>
                                <div class="form-group">
                                    <label>Rear Wheel</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Rear Wheel" name="RearWheel">
                                </div>
                                <h2>Brake System</h2>
                                <div class="form-group">
                                    <label>Front Brake</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Front Brake" name="FrontBrake">
                                </div>
                                <div class="form-group">
                                    <label>Rear Brake</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Rear Brake" name="RearBrake">
                                </div>
                                <div class="form-group">
                                    <label>ABS System</label>
                                    <input required  type="text" class="form-control" placeholder="Enter ABS System" name="ABSSystem">
                                </div>
                                <h2>Fuel</h2>
                                <div class="form-group">
                                    <label>Mileage </label>
                                    <input required  type="text" class="form-control" placeholder="Enter Mileage" name="Mileage">
                                </div>
                                <div class="form-group">
                                    <label>Fuel Type</label>
                                    <select name="FuelType" class="form-control">
                                        <option value="Petrol">Petrol</option>
                                        <option value="Diesel">Diesel</option>
                                        <option value="Electric">Electric</option>
                                    </select>
                                    {{-- <input required  type="text" class="form-control" placeholder="Enter Fuel Type" name="FuelType"> --}}

                                </div>
                                <h2>Capacities</h2>
                                <div class="form-group">
                                    <label>Seating Capacity</label>
                                    <select name="SeatingCapacity" class="form-control">
                                        <option value="2 People">2 People</option>
                                        <option value="4 People">4 People</option>
                                        <option value="6 People">6 People</option>
                                        <option value="8 People">8 People</option>
                                        <option value="10 People">10 People</option>
                                    </select>
                                    {{-- <input required  type="text" class="form-control" placeholder="Enter Seating Capacity" name="SeatingCapacity"> --}}
                                </div>
                                <div class="form-group">
                                    <label>Fuel Tank Capacity</label>
                                    <input required  type="text" class="form-control" placeholder="Enter Fuel Tank Capacity" name="FuelTankCapacity">
                                </div>
                                <h2>
                                    Features
                                </h2>
                                <div class="form-group">
                                    <label>Features</label>
                                    <textarea  required type="text" class="form-control" placeholder="Enter Features" name="Features">
                                    </textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
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
