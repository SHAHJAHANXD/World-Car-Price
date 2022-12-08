@extends('front.layout')
@section('title')
World New {{ $category->category_name }} Prices, Specifications, Interior & Exterior - World Car Price
@endsection
@section('description')
Discover all the information regarding New {{ $category->category_name }} Prices. Find out the on-road costs, details, and features of all the newest car models.
@endsection
@section('content')
    <main class="main">
        <div class="container">
            <section class="row">
                @if (session('error'))
                    <div class="alert alert-danger m-4 text-center ml-3">
                        {{ session('error') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="row adjust-row">
                    <div class="col-lg-7">
                        <div class="row">
                            <div class="col-12">
                                <h1 style="    margin-top: 25px;">
                                New {{ $category->category_name }} 2022, New Car Prices And Specs
                                </h1>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($cars as $cars)
                                <div class="col-md-6">
                                    <div class="car">
                                        <div class="splide__track">
                                            <ul class="splide__list">
                                                @php
                                                    $UserData = \App\Models\UserData::where('ip', $ip)->first('country_id');
                                                    $country = \App\Models\Country::where('id', $UserData->country_id)->first();
                                                    $images = \App\Models\Images::where('product_id', $cars->id)->first();
                                                @endphp

                                                <li class="splide__slide">
                                                    <a href="/product-detail/{{ $cars->slug }}"> <img id="product_img"
                                                            src="{{ $images->Image }}" alt="{{ $cars->Title }}"></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <div class="car__title">
                                            <h3 class="car__name"><a class="Car_name_modify"
                                                    href="/product-detail/{{ $cars->slug }}">{{ $cars->Title }}</a></h3>
                                            <span class="car__year"><a
                                                    href="/product-detail/{{ $cars->slug }}">{{ $cars->Year }}</a></span>
                                        </div>
                                        <div class="car__footer">
                                            <span class="car__price">{{ $country->symbol }}
                                                {{ $cars->Price * $country->rate }}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @if ($carss == true)
                        <div class="col-lg-4 offset-lg-1">
                            <div class="">
                                <div class="offer">
                                    <span class="offer__title" style="color: red">BROWSE BY BRANDS</span>
                                    <div class="row">
                                        @foreach ($brand as $brand)
                                            <div class="col-6"
                                                style="margin-top: 10px; text-align: center; margin-bottom: 10px;">
                                                <a href="/{{ $category->category_name }}/{{ $brand->Brand_name }}"
                                                    style="color: black;">
                                                    <b>{{ $brand->Brand_name }}</b>
                                                </a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @if ($category->category_name == 'Car')
                                    <div class="offer">
                                        <span class="offer__title" style="color: red">BODY TYPE</span>
                                        <div class="row">
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/body-type/Coupe" style="color: black;">
                                                    <b>
                                                        Coupe
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/body-type/Sedan" style="color: black;">
                                                    <b>
                                                        Sedan
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/body-type/SUV" style="color: black;">
                                                    <b>
                                                        SUV
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/body-type/Hatchback" style="color: black;">
                                                    <b>
                                                        Hatchback
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/body-type/Convertible" style="color: black;">
                                                    <b>
                                                        Convertible
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/body-type/MiniTruck" style="color: black;">
                                                    <b>
                                                        MiniTruck
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/body-type/Sports" style="color: black;">
                                                    <b>
                                                        Sports
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/body-type/Wagon" style="color: black;">
                                                    <b>
                                                        Wagon
                                                    </b>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="offer">
                                        <span class="offer__title" style="color: red">TRANSMISSION TYPE</span>
                                        <div class="row">
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/transmission-type/Automatic"
                                                    style="color: black;">
                                                    <b>
                                                        Automatic
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/transmission-type/Manual" style="color: black;">
                                                    <b>
                                                        Manual
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/transmission-type/Electric"
                                                    style="color: black;">
                                                    <b>
                                                        Electric
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/transmission-type/CVT" style="color: black;">
                                                    <b>
                                                        CVT
                                                    </b>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offer">
                                        <span class="offer__title" style="color: red">DRIVE TYPE</span>
                                        <div class="row">
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/drive-type/All-Wheel-Drive"
                                                    style="color: black;">
                                                    <b>
                                                        All Wheel Drive
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/drive-type/Rear-Wheel-Drive"
                                                    style="color: black;">
                                                    <b>
                                                        Rear Wheel Drive
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/drive-type/Front-Wheel-Drive"
                                                    style="color: black;">
                                                    <b>
                                                        Front Wheel Drive
                                                    </b>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offer">
                                        <span class="offer__title" style="color: red">FUEL TYPE</span>
                                        <div class="row">
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/fuel-type/Premium" style="color: black;">
                                                    <b>
                                                        Premium
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/fuel-type/Gasoline" style="color: black;">
                                                    <b>
                                                        Gasoline
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/fuel-type/Hybrid" style="color: black;">
                                                    <b>
                                                        Hybrid
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/fuel-type/Petrol" style="color: black;">
                                                    <b>
                                                        Petrol
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/fuel-type/Electric" style="color: black;">
                                                    <b>
                                                        Electric
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/fuel-type/Diesel" style="color: black;">
                                                    <b>
                                                        Diesel
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/fuel-type/CNG" style="color: black;">
                                                    <b>
                                                        CNG
                                                    </b>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="offer">
                                        <span class="offer__title" style="color: red">CAPACITIES</span>
                                        <div class="row">
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/capacities-type/2-Seats"
                                                    style="color: black;">
                                                    <b>
                                                        2 Seats
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/capacities-type/4-Seats"
                                                    style="color: black;">
                                                    <b>
                                                        4 Seats
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/capacities-type/5-Seats"
                                                    style="color: black;">
                                                    <b>
                                                        5 Seats
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/capacities-type/6-Seats"
                                                    style="color: black;">
                                                    <b>
                                                        6 Seats
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/capacities-type/7-Seats"
                                                    style="color: black;">
                                                    <b>
                                                        7 Seats
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/capacities-type/8-Seats"
                                                    style="color: black;">
                                                    <b>
                                                        8 Seats
                                                    </b>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="offer">
                                        <span class="offer__title" style="color: red">NUMBER OF DOORS</span>
                                        <div class="row">
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/doors/2 Doors" style="color: black;">
                                                    <b>
                                                        2 Doors
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/doors/4 Doors" style="color: black;">
                                                    <b>
                                                        4 Doors
                                                    </b>
                                                </a>
                                            </div>
                                            <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                                <a href="/doors/5 Doors" style="color: black;">
                                                    <b>
                                                        5 Doors
                                                    </b>
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </section>
        </div>
    </main>
@endsection
