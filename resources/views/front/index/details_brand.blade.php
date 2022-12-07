@extends('front.layout')
@section('title')
New Upcoming {{ $category->category_name }} Price & Specification - World Car Price
@endsection
@section('description')
Find upcoming {{ $category->category_name }} models' prices in 2023, their pictures, and specifications - Compare cars, read new car reviews and post ratings at Car World Price.
@endsection
@section('content')
<main class="main">
    <div class="container">
        <section class="row row--grid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12">
                            <h1 style="    margin-top: 25px;">
                            New {{ $brands }} 2023, New Car Prices And Specs
                            </h1>
                        </div>
                        <div class="col-12">
                           <p>
                            Find the best new released and upcoming 2023-2024 {{ $brands }} cars prices, full specifications, and newly released features on World Car Price
                           </p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($cars as $cars)
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
                                            <a href="/product-detail/{{ $cars->Title }}"> <img src="{{ $images->Image }}" alt="{{ $cars->Title }}" style="height: 245px; width: 370px; border-radius: 20px; margin-bottom: 10px;"></a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="car__title">
                                    <h3 class="car__name"><a href="/product-detail/{{ $cars->Title }}">{{ $cars->Title }}</a></h3>
                                    <span class="car__year"><a href="/product-detail/{{ $cars->Title }}">{{ $cars->Year }}</a></span>
                                </div>
                                <div class="car__footer">
                                    <span class="car__price">{{ $country->symbol }} {{ $cars->Price * $country->rate }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>

                </div>
                @if ($carss == true)
                <div class="col-lg-4" style="border: 1px solid;border-radius: 10px;">
                    <div class="">
                        <div class="offer">
                            <span class="offer__title" style="color: red">BROWSE BY BRANDS</span>
                            <div class="row">
                                @foreach ($brand as $brand)
                                <div class="col-6" style="margin-top: 10px; text-align: center; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/{{ $brand->Brand_name }}" style="color: black;">
                                        <b>{{ $brand->Brand_name }}</b>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @if ($category->category_name == 'Car' && $category->category_name == 'E Car')
                        <div class="offer">
                            <span class="offer__title" style="color: red">BODY TYPE</span>
                            <div class="row">
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-body-type/Coupe" style="color: black;">
                                        <b>
                                            Coupe
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-body-type/Sedan" style="color: black;">
                                        <b>
                                            Sedan
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-body-type/SUV" style="color: black;">
                                        <b>
                                            SUV
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-body-type/Hatchback" style="color: black;">
                                        <b>
                                            Hatchback
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-body-type/Convertible" style="color: black;">
                                        <b>
                                            Convertible
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-body-type/MiniTruck" style="color: black;">
                                        <b>
                                            MiniTruck
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-body-type/Sports" style="color: black;">
                                        <b>
                                            Sports
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-body-type/Wagon" style="color: black;">
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
                                    <a href="/product-detail-by-brand/Automatic" style="color: black;">
                                        <b>
                                            Automatic
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Manual" style="color: black;">
                                        <b>
                                            Manual
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Electric" style="color: black;">
                                        <b>
                                            Electric
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/CVT" style="color: black;">
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
                                    <a href="/product-detail-by-brand/All Wheel Drive" style="color: black;">
                                        <b>
                                            All Wheel Drive
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Rear Wheel Drive" style="color: black;">
                                        <b>
                                            Rear Wheel Drive
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Front Wheel Drive" style="color: black;">
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
                                    <a href="/product-detail-by-brand/Premium" style="color: black;">
                                        <b>
                                            Premium
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Gasoline" style="color: black;">
                                        <b>
                                            Gasoline
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Hybrid" style="color: black;">
                                        <b>
                                            Hybrid
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Petrol" style="color: black;">
                                        <b>
                                            Petrol
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Diesel" style="color: black;">
                                        <b>
                                            Diesel
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/CNG" style="color: black;">
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
                                    <a href="/product-detail-by-brand/2 Seats" style="color: black;">
                                        <b>
                                            2 Seats
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/4 Seats" style="color: black;">
                                        <b>
                                            4 Seats
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/5 Seats" style="color: black;">
                                        <b>
                                            5 Seats
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/6 Seats" style="color: black;">
                                        <b>
                                            6 Seats
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/7 Seats" style="color: black;">
                                        <b>
                                            7 Seats
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/8 Seats" style="color: black;">
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
                                    <a href="/product-detail-by-brand/2 Doors" style="color: black;">
                                        <b>
                                            2 Doors
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/4 Doors" style="color: black;">
                                        <b>
                                            4 Doors
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/5 Doors" style="color: black;">
                                        <b>
                                            5 Doors
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Petrol" style="color: black;">
                                        <b>
                                            Petrol
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/Diesel" style="color: black;">
                                        <b>
                                            Diesel
                                        </b>
                                    </a>
                                </div>
                                <div class="col-12" style="margin-top: 10px; margin-bottom: 10px;">
                                    <a href="/product-detail-by-brand/CNG" style="color: black;">
                                        <b>
                                            CNG
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
