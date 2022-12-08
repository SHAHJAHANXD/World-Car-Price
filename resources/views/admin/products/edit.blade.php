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
    <link rel="stylesheet" href="{{ asset('admin/plugins/summernote/summernote-bs4.min.css') }}">
    <script src="{{ asset('admin/plugins/summernote/summernote-bs4.min.js') }}"></script>
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
                <div class="row" style="justify-content: center;">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add New Product</h3>
                            </div>
                            <form action="{{ route('admin.post_edit_products1') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="text" hidden name="id" value="{{ $id }}">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select name="Category" class="form-control">
                                            <option selected value="{{ $category->id }}">
                                                {{ $category->category_name }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Choose Brand</label>
                                        <select name="Brand" class="form-control">
                                            <option value="{{ $Products->Brand }}" selected>{{ $Products->Brand }}
                                            </option>
                                            @foreach ($Brand as $Brand)
                                                <option value="{{ $Brand->Brand_name }}">{{ $Brand->Brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Status</label>
                                        <select name="Product_status" class="form-control">
                                            <option value="{{ $Products->Product_status }}" selected>
                                                {{ $Products->Product_status }}</option>
                                            <option value="">Choose Product Status</option>
                                            <option value="Coming">Coming</option>
                                            <option value="New Released">New Released</option>
                                            <option value="Price Update">Price Update</option>
                                            <option value="Discontinued">Discontinued</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Upcoming</label>
                                        <select name="Upcoming" class="form-control">
                                            <option value="{{ $Products->Upcoming }}" selected>{{ $Products->Upcoming }}
                                            </option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Top 10</label>
                                        <select name="top_10" class="form-control">
                                            <option value="{{ $Products->top_10 }}" selected>{{ $Products->top_10 }}
                                            </option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input type="text" value="{{ $Products->Title }}" class="form-control"
                                            name="Title" placeholder="Enter Product Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Product Slug</label>
                                        <input required type="text" value="{{ $Products->slug  ?? 'No Data'}}" class="form-control" name="slug"
                                            placeholder="Enter Product Slug">
                                    </div>
                                    <div class="form-group">
                                        <label>Year</label>
                                        <input type="number" value="{{ $Products->Year }}" class="form-control"
                                            name="Year" placeholder="Enter Year">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Images</label>
                                            <input type="file" class="form-control" name="Multiple_images[]" multiple>
                                        </div>
                                    </div>
                                    @if ($category->category_name == 'Car' || $category->category_name == 'E Car')
                                        <div class="form-group">
                                            <label>Body Type</label>
                                            <select name="Body_type" class="form-control">
                                                <option value="{{ $Products->Body_type }}" selected>
                                                    {{ $Products->Body_type }}</option>
                                                <option value="Coupe">Coupe</option>
                                                <option value="Sedan">Sedan</option>
                                                <option value="SUV">SUV</option>
                                                <option value="Hatchback">Hatchback</option>
                                                <option value="Convertible">Convertible</option>
                                                <option value="Mini">Mini</option>
                                                <option value="Truck">Truck</option>
                                                <option value="Sports">Sports</option>
                                                <option value="Wagon">Wagon</option>
                                            </select>
                                        </div>

                                        @if ($category->category_name == 'Car')
                                            <div class="form-group">
                                                <label>Transmission Type</label>
                                                <select name="Transmission_type" class="form-control">
                                                    <option value="{{ $Products->Transmission_type }}" selected>
                                                        {{ $Products->Transmission_type }}</option>
                                                    <option value="Automatic">Automatic</option>
                                                    <option value="Manual">Manual</option>
                                                    <option value="Electric">Electric</option>
                                                    <option value="CVT">CVT</option>
                                                </select>
                                            </div>
                                        @endif
                                        @if ($category->category_name == 'E Car')
                                            <div class="form-group">
                                                <label>Transmission Type</label>
                                                <select name="Transmission_type" class="form-control">
                                                    <option value="{{ $Products->Transmission_type }}" selected>
                                                        {{ $Products->Transmission_type }}</option>
                                                    <option value="Automatic">Automatic</option>
                                                    <option value="Single-Speed">Single-Speed</option>
                                                    <option value="Dual-Speed">Dual-Speed</option>
                                                </select>
                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <label>Drive Type</label>
                                            <select name="Drive_type" class="form-control">
                                                <option value="{{ $Products->Drive_type }}" selected>
                                                    {{ $Products->Drive_type }}</option>
                                                <option value="All-Wheel-Drive">All Wheel Drive</option>
                                                <option value="Rear-Wheel-Drive">Rear Wheel Drive</option>
                                                <option value="Front-Wheel-Drive">Front Wheel Drive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Fule Type</label>
                                            <select name="Fuel_type" class="form-control">
                                                <option value="{{ $Products->Fuel_type }}" selected>
                                                    {{ $Products->Fuel_type }}</option>
                                                <option value="Premium">Premium</option>
                                                <option value="Gasoline">Gasoline</option>
                                                <option value="Hybrid">Hybrid</option>
                                                <option value="Petrol">Petrol</option>
                                                <option value="Electric">Electric</option>
                                                <option value="Diesel">Diesel</option>
                                                <option value="CNG">CNG</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Capacities</label>
                                            <select name="Capacities" class="form-control">
                                                <option value="{{ $Products->Capacities }}" selected>
                                                    {{ $Products->Capacities }}</option>
                                                <option value="2-Seats">2 Seats</option>
                                                <option value="4-Seats">4 Seats</option>
                                                <option value="5-Seats">5 Seats</option>
                                                <option value="6-Seats">6 Seats</option>
                                                <option value="7-Seats">7 Seats</option>
                                                <option value="8-Seats">8 Seats</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Number Of Doors</label>
                                            <select name="Doors" class="form-control">
                                                <option value="{{ $Products->Doors }}" selected>{{ $Products->Doors }}
                                                </option>
                                                <option value="2 Doors">2 Doors</option>
                                                <option value="4-Doors">4 Doors</option>
                                                <option value="5-Doors">5 Doors</option>
                                            </select>
                                        </div>
                                    @endif

                                    @if ($category->category_name == 'Bikes' || $category->category_name == 'E Bikes')
                                        <div class="form-group">
                                            <label>Body Type</label>
                                            <select name="Body_type" class="form-control">
                                                <option value="{{ $Products->Body_type }}" selected>
                                                    {{ $Products->Body_type }}</option>
                                                <option value="Heavy">Heavy</option>
                                                <option value="Commuter">Commuter</option>
                                                <option value="Cruiser">Cruiser</option>
                                                <option value="Naked">Naked</option>
                                                <option value="Scooter">Scooter</option>
                                                <option value="Sports">Sports</option>
                                                <option value="Standard">Standard</option>
                                                <option value="Adventure Tourer">Adventure Tourer</option>
                                                <option value="Moped">Moped</option>
                                                <option value="ATV">ATV</option>
                                                <option value="Cafe Racer">Cafe Racer</option>
                                                <option value="Off-Road">Off-Road</option>
                                            </select>
                                        </div>
                                        @if ($category->category_name == 'Bikes')
                                            <div class="form-group">
                                                <label>Engine Displacement</label>
                                                <select name="Millage" class="form-control">
                                                    <option value="{{ $Products->Millage }}" selected>
                                                        {{ $Products->Millage }}</option>
                                                    <option value="Upto 100cc">Upto 100cc</option>
                                                    <option value="101cc to 125cc">101cc to 125cc</option>
                                                    <option value="126cc to 150cc">126cc to 150cc</option>
                                                    <option value="151cc to 200cc">151cc to 200cc</option>
                                                    <option value="201cc to 250cc">201cc to 250cc</option>
                                                    <option value="251cc to 500cc">251cc to 500cc</option>
                                                    <option value="501cc to 1000cc">501cc to 1000cc</option>
                                                    <option value="Above 1000cc">Above 1000cc</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Millage</label>
                                                <select name="Millage" class="form-control">
                                                    <option value="{{ $Products->Millage }}" selected>
                                                        {{ $Products->Millage }}</option>
                                                    <option value="Upto 30 kmpl">Upto 30 kmpl</option>
                                                    <option value="31 to 50 kmpl">31 to 50 kmpl</option>
                                                    <option value="Above 50 kmpl">Above 50 kmpl</option>
                                                </select>
                                            </div>
                                        @endif
                                        @if ($category->category_name == 'E Bikes')
                                            <div class="form-group">
                                                <label>Millage Per Charge</label>
                                                <select name="Millage" class="form-control">
                                                    <option value="{{ $Products->Millage }}" selected>
                                                        {{ $Products->Millage }}</option>
                                                    <option value="Upto 50 Km">Upto 50 Km</option>
                                                    <option value="Upto 100 Km">Upto 100 Km</option>
                                                    <option value="Upto 150 Km">Upto 150 Km</option>
                                                    <option value="Upto 200 km">Upto 200 km</option>
                                                    <option value="Above 200 km">Above 200 km</option>
                                                </select>
                                            </div>
                                        @endif
                                        @if ($category->category_name == 'Bikes')
                                            <div class="form-group">
                                                <label>Transmission Type</label>
                                                <select name="Transmission_type" class="form-control">
                                                    <option value="{{ $Products->Transmission_type }}" selected>
                                                        {{ $Products->Transmission_type }}</option>
                                                    <option value="Automatic">Automatic</option>
                                                    <option value="CVT">CVT</option>
                                                    <option value="Manual">Manual</option>
                                                    <option value="4 Speed">4 Speed</option>
                                                    <option value="5 Speed">5 Speed</option>
                                                    <option value="6 Speed">6 Speed</option>
                                                    <option value="Mesh">Mesh</option>
                                                </select>
                                            </div>
                                        @endif
                                        @if ($category->category_name == 'E Bikes')
                                            <div class="form-group">
                                                <label>Top Speed</label>
                                                <select name="Top_speed" class="form-control">
                                                    <option value="{{ $Products->Top_speed }}" selected>
                                                        {{ $Products->Top_speed }}</option>
                                                    <option value="Upto 60 km">Upto 60 km</option>
                                                    <option value="Upto 120 km">Upto 120 km</option>
                                                    <option value="Upto 180 km">Upto 180 km</option>
                                                    <option value="Upto 240 km">Upto 240 km</option>
                                                    <option value="Above 240 km">Above 240 km</option>
                                                </select>
                                            </div>
                                        @endif
                                    @endif
                                    <div class="form-group">
                                        <label for="">Short Description</label>
                                        <textarea class="form-control" name="Short_Description">
                                        {{ $Products->Short_Description }}
                                    </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Long Description</label>
                                        <textarea class="summernote" name="Description">
                                        {!! $Products->Description !!}
                                    </textarea>
                                        @if ($errors->has('Description'))
                                            <span class="text-danger">{{ $errors->first('Description') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Product Price</label>
                                        <input type="number" value="{{ $Products->Price }}" class="form-control"
                                            name="Price" placeholder="Enter Product Price">
                                    </div>

                                    <div class="form-group">
                                        <label>Country</label>
                                        <select name="Country" id="" class="form-control">
                                            <option value="{{ $Products->Country }}" selected>{{ $Products->Country }}
                                            </option>
                                            @foreach ($country as $country)
                                                <option value="{{ $country->name }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
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
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
    <script type="text/javascript">
        $('.show_confirm').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        form.submit();
                    }
                });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.stepper = new Stepper(document.querySelector('.bs-stepper'))
        })
    </script>
    <script>
        $(function() {
            // Summernote
            $('.summernote').summernote()
        })
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
            mode: "htmlmixed",
            theme: "monokai"
        });
    </script>
    <script nonce="65b5ca72-50ae-4070-a57b-1da554d78615">
        (function(w, d) {
            ! function(Z, _, ba, bb) {
                Z.zarazData = Z.zarazData || {};
                Z.zarazData.executed = [];
                Z.zaraz = {
                    deferred: [],
                    listeners: []
                };
                Z.zaraz.q = [];
                Z.zaraz._f = function(bc) {
                    return function() {
                        var bd = Array.prototype.slice.call(arguments);
                        Z.zaraz.q.push({
                            m: bc,
                            a: bd
                        })
                    }
                };
                for (const be of ["track", "set", "debug"]) Z.zaraz[be] = Z.zaraz._f(be);
                Z.zaraz.init = () => {
                    var bf = _.getElementsByTagName(bb)[0],
                        bg = _.createElement(bb),
                        bh = _.getElementsByTagName("title")[0];
                    bh && (Z.zarazData.t = _.getElementsByTagName("title")[0].text);
                    Z.zarazData.x = Math.random();
                    Z.zarazData.w = Z.screen.width;
                    Z.zarazData.h = Z.screen.height;
                    Z.zarazData.j = Z.innerHeight;
                    Z.zarazData.e = Z.innerWidth;
                    Z.zarazData.l = Z.location.href;
                    Z.zarazData.r = _.referrer;
                    Z.zarazData.k = Z.screen.colorDepth;
                    Z.zarazData.n = _.characterSet;
                    Z.zarazData.o = (new Date).getTimezoneOffset();
                    Z.zarazData.q = [];
                    for (; Z.zaraz.q.length;) {
                        const bl = Z.zaraz.q.shift();
                        Z.zarazData.q.push(bl)
                    }
                    bg.defer = !0;
                    for (const bm of [localStorage, sessionStorage]) Object.keys(bm || {}).filter((bo => bo
                        .startsWith("_zaraz_"))).forEach((bn => {
                        try {
                            Z.zarazData["z_" + bn.slice(7)] = JSON.parse(bm.getItem(bn))
                        } catch {
                            Z.zarazData["z_" + bn.slice(7)] = bm.getItem(bn)
                        }
                    }));
                    bg.referrerPolicy = "origin";
                    bg.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(Z
                        .zarazData)));
                    bf.parentNode.insertBefore(bg, bf)
                };
                ["complete", "interactive"].includes(_.readyState) ? zaraz.init() : Z.addEventListener(
                    "DOMContentLoaded", zaraz.init)
            }(w, d, 0, "script");
        })(window, document);
    </script>
    </head>
@endsection
