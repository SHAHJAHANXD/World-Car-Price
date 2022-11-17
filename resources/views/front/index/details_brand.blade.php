@extends('front.layout')
@section('title')
Details Page
@endsection
@section('content')
<main class="main">
    <div class="container">
        <section class="row row--grid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">
                        @foreach($cars as $cars)
                        <div class="col-md-6">
                            <div class="car">
                                <div class="splide splide--card car__slider">
                                    <div class="splide__arrows">
                                        <button class="splide__arrow splide__arrow--prev" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M17,11H9.41l3.3-3.29a1,1,0,1,0-1.42-1.42l-5,5a1,1,0,0,0-.21.33,1,1,0,0,0,0,.76,1,1,0,0,0,.21.33l5,5a1,1,0,0,0,1.42,0,1,1,0,0,0,0-1.42L9.41,13H17a1,1,0,0,0,0-2Z"></path>
                                            </svg></button>
                                        <button class="splide__arrow splide__arrow--next" type="button"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z"></path>
                                            </svg></button>
                                    </div>
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            @php
                                             $images = \App\Models\Images::where('product_id', $cars->id)->get();
                                            $UserData = \App\Models\UserData::where('ip', $ip)->first('country_id');
                                            $country = \App\Models\Country::where('id', $UserData->country_id)->first();
                                            @endphp
                                            @foreach ($images as $images)
                                            <li class="splide__slide">
                                                <img src="{{ $images->Image }}" alt="{{ $cars->ProductName }}" style="height: 245px;">
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="car__title">
                                    <h3 class="car__name"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Title }}</a></h3>
                                    <span class="car__year">{{ $cars->Year }}</span>
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
                <div class="col-lg-4">
                    <div class="">
                        <div class="offer">
                            <span class="offer__title" style="color: red">BROWSE BY BRANDS</span>
                            <div class="row">
                                @foreach ($brand as $brand)
                                <div class="col-6">
                                    <a href="" style="color: black  ;   padding: 20px 20px 20px 20px;">
                                        <b>{{ $brand->Brand_name }}</b>
                                    </a>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif

            </div>

        </section>
    </div>
</main>
@endsection
