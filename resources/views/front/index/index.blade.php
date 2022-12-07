@extends('front.layout')
@section('title')
Get The Latest New Car Price, launching & Specifications - World Car Price
@endsection
@section('description')
World Car Price provides New Cars, e-cars, Bikes, e-bike launching, Specifications, Comparison Photos of the Interior and Exterior, and Reviews.
@endsection
@section('content')
    <main class="main">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                    <form action="/" method="GET" class="sign__form sign__form--profile">
                        <div class="row">
                            <div class="sign__group col-8">
                                <input id="" type="search" name="search" value="{{ $search }}"
                                    class="sign__input" placeholder="Product Search">
                            </div>
                            <div class="col-4">
                                <button class="sign__btn" type="submit"><span>Search</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row row--grid">
                <div class="col-12">
                    <div class="main__title main__title--first">
                        <h2>New Vehicle Prices 2022</h2>
                    </div>
                </div>
            </div>
            <div class="row" style="    border-radius: 10px;
            box-shadow: 0px 0px 5px 0px #aaa;">
                @forelse ($Products as $cars)
                    <div class="col-12 col-md-4 col-lg-3 col-xl-3">
                        <div class="car">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @php
                                        $UserData = \App\Models\UserData::where('ip', $ip)->first('country_id');
                                        $country = \App\Models\Country::where('id', $UserData->country_id)->first();
                                        $images = \App\Models\Images::where('product_id', $cars->id)->first();
                                    @endphp
                                    <li class="splide__slide">
                                        <a href="/product-detail/{{ $cars->slug }}">
                                            <div class="div">
                                                <img id="product_img"
                                                src="{{ $images->Image }}" alt="{{ $cars->Title }}">
                                            </div>


                                            </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="car__title">
                                <h3 class="car__name"><a class="Car_name_modify"
                                        href="/product-detail/{{ $cars->slug }}">{{ $cars->Title }}
                                        {{ $cars->Year }}</a></h3>
                            </div>
                            <div class="car__footer">
                                <span class="car__price">{{ $country->symbol }} {{ $cars->Price * $country->rate }}</span>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </main>
@endsection
