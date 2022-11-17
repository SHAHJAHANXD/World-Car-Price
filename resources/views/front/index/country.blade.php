@extends('front.layout')
@section('title')
All Countries
@endsection
@section('extra-heads')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
@endsection
@section('content')
<main class="main">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-12 col-lg-6">
                <form action="#" class="sign__form sign__form--profile">
                    <div class="row">
                        <div class="sign__group col-8">
                            <input id="myInput" type="text" name="" class="sign__input" placeholder="Product Search">
                        </div>
                        <div class="col-4">
                            <button class="sign__btn" type="button"><span>Search</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-top: 50px;">
            <div class="col-12">
                <h2 style="text-align: center;">Choose Any Country</h2>
            </div>
        </div>
    </div>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

    </style>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table id="myDataTable">
                    <thead>
                        <tr>
                            <th>Countries</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        @foreach ($country as $country)
                        <div class="row">
                            <div class="col-lg-3">
                                <tr>
                                    <td><a href="/choose-country/{{ $country->id }}" style="    color: black;">{{ $country->name }}</a></td>
                                </tr>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row" style="margin-top: 50px;">
            @foreach ($country as $country)
            <div class="col-lg-4 col-md-6 col-sm-8" style="    padding: 10px;
            text-align: center;
            border: 1px solid;">
                <a href="/choose-country/{{ $country->id }}" style=" color: black;">{{ $country->name }}</a>
    </div>
    @endforeach
    </div>
    </div> --}}
</main>
@endsection
@section('extra-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

</script>
<script>
    $(document).ready(function() {
        $('#myDataTable').DataTable();
    });
</script>
@endsection
