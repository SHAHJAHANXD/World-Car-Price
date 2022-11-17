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
                        <form action="{{ route('admin.post_products1') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input required type="text" hidden name="Posted_By" value="{{ Auth::user()->id }}">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Category</label>
                                    <select required name="Category" class="form-control">
                                        <option selected value="{{ $category->id }}">
                                            {{ $category->category_name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Choose Brand</label>
                                    <select required name="Brand" class="form-control">
                                        <option value="" selected>Choose Brand</option>
                                        @foreach ($Brand as $Brand)
                                        <option value="{{ $Brand->Brand_name }}">{{ $Brand->Brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Status</label>
                                    <select required name="Product_status" class="form-control">
                                        <option value="" selected>Choose Product Status</option>
                                        <option value="Coming">Coming</option>
                                        <option value="New Released">New Released</option>
                                        <option value="Price Update">Price Update</option>
                                        <option value="Discontinued">Discontinued</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Top 10</label>
                                    <select required name="top_10" class="form-control">
                                        <option value="" selected>Choose option</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Product Name</label>
                                    <input required type="text" class="form-control" name="Title" placeholder="Enter Product Name">
                                </div>
                                <div class="form-group">
                                    <label>Year</label>
                                    <input required type="text" class="form-control" name="Year" placeholder="Enter Year">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Images</label>
                                        <input required type="file" class="form-control" name="Multiple_images[]" multiple>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Body Type</label>
                                    <select required name="Body_type" class="form-control">
                                        <option value="" selected>Choose option</option>
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
                                <div class="form-group">
                                    <label>Transmission Type</label>
                                    <select required name="Transmission_type" class="form-control">
                                        <option value="" selected>Choose option</option>
                                        <option value="Automatic">Automatic</option>
                                        <option value="Manual">Manual</option>
                                        <option value="Electric">Electric</option>
                                        <option value="CVT">CVT</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Drive Type</label>
                                    <select required name="Drive_type" class="form-control">
                                        <option value="" selected>Choose option</option>
                                        <option value="All-Wheel-Drive">All Wheel Drive</option>
                                        <option value="Rear-Wheel-Drive">Rear Wheel Drive</option>
                                        <option value="Front-Wheel-Drive">Front Wheel Drive</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Fule Type</label>
                                    <select required name="Fuel_type" class="form-control">
                                        <option value="" selected>Choose option</option>
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
                                    <select required name="Capacities" class="form-control">
                                        <option value="" selected>Choose option</option>
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
                                    <select required name="Doors" class="form-control">
                                        <option value="" selected>Choose option</option>
                                        <option value="2 Doors">2 Doors</option>
                                        <option value="4-Doors">4 Doors</option>
                                        <option value="5-Doors">5 Doors</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Short Description</label>
                                    <textarea required class="form-control" name="Short_Description">
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Long Description</label>
                                    <textarea class="summernote" name="Description"></textarea>
                                    @if ($errors->has('Description'))
                                    <span class="text-danger">{{ $errors->first('Description') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Product Price</label>
                                    <input required type="text" class="form-control" name="Price" placeholder="Enter Product Price">
                                </div>

                                <div class="form-group">
                                    <label>Country</label>
                                    <select required required name="Country" id="" class="form-control">
                                        <option value="">Choose Country</option>
                                        @foreach ($country as $country)
                                        <option value="{{ $country->name }}">{{ $country->name  }}</option>
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
        mode: "htmlmixed"
        , theme: "monokai"
    });

</script>
<script nonce="65b5ca72-50ae-4070-a57b-1da554d78615">
    (function(w, d) {
        ! function(Z, _, ba, bb) {
            Z.zarazData = Z.zarazData || {};
            Z.zarazData.executed = [];
            Z.zaraz = {
                deferred: []
                , listeners: []
            };
            Z.zaraz.q = [];
            Z.zaraz._f = function(bc) {
                return function() {
                    var bd = Array.prototype.slice.call(arguments);
                    Z.zaraz.q.push({
                        m: bc
                        , a: bd
                    })
                }
            };
            for (const be of ["track", "set", "debug"]) Z.zaraz[be] = Z.zaraz._f(be);
            Z.zaraz.init = () => {
                var bf = _.getElementsByTagName(bb)[0]
                    , bg = _.createElement(bb)
                    , bh = _.getElementsByTagName("title")[0];
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
                for (const bm of [localStorage, sessionStorage]) Object.keys(bm || {}).filter((bo => bo.startsWith("_zaraz_"))).forEach((bn => {
                    try {
                        Z.zarazData["z_" + bn.slice(7)] = JSON.parse(bm.getItem(bn))
                    } catch {
                        Z.zarazData["z_" + bn.slice(7)] = bm.getItem(bn)
                    }
                }));
                bg.referrerPolicy = "origin";
                bg.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(Z.zarazData)));
                bf.parentNode.insertBefore(bg, bf)
            };
            ["complete", "interactive"].includes(_.readyState) ? zaraz.init() : Z.addEventListener("DOMContentLoaded", zaraz.init)
        }(w, d, 0, "script");
    })(window, document);

</script>
</head>
@endsection
