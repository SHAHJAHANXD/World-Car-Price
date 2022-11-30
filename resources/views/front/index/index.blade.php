@extends('front.layout')
@section('title')
World Car Price
@endsection
@section('content')
<main class="main">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-12 col-lg-6 col-md-6 col-sm-12">
                <form action="/" method="GET" class="sign__form sign__form--profile">
                    <div class="row">
                        <div class="sign__group col-8">
                            <input id="" type="search" name="search" value="{{$search}}" class="sign__input" placeholder="Product Search">
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
        <div class="row">
            @forelse ($Products as $cars)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="car">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @php
                            $UserData = \App\Models\UserData::where('ip', $ip)->first('country_id');
                            $country = \App\Models\Country::where('id', $UserData->country_id)->first();
                            $images = \App\Models\Images::where('product_id', $cars->id)->first();
                            @endphp
                            <li class="splide__slide">
                                <a href="/product-detail/{{ $cars->id }}"> <img class="product_img" src="{{ $images->Image }}" alt="{{ $cars->Title }}"></a>
                            </li>
                        </ul>
                    </div>
                    <div class="car__title">
                        <h3 class="car__name"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Title }} {{ $cars->Year }}</a></h3>
                        {{-- <span class="car__year"><a href="/product-detail/{{ $cars->id }}"></a></span> --}}
                    </div>
                    <div class="car__footer">
                        <span class="car__price">{{ $country->symbol }} {{ $cars->Price * $country->rate }}</span>
                    </div>
                </div>
            </div>
            @empty
            @endforelse
        </div>
        {{-- <section class="row row--grid">
            <div class="col-12">
                <div class="main__title main__title--first">
                    <h2>Popular Electric Cars</h2>
                    <a href="/product-detail-by-category/2" class="main__link">View more <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                            <path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z" /></svg></a>
                </div>
            </div>
            @forelse ($e_cars as $cars)
            <div class="col-12 col-md-6 col-xl-4">
                <div class="car">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @php
                            $UserData = \App\Models\UserData::where('ip', $ip)->first('country_id');
                            $country = \App\Models\Country::where('id', $UserData->country_id)->first();
                            $images = \App\Models\Images::where('product_id', $cars->id)->first();
                            @endphp

                            <li class="splide__slide">
                                  <a href="/product-detail/{{ $cars->id }}"> <img src="{{ $images->Image }}" alt="{{ $cars->Title }}" style="height: 245px; width: 370px; border-radius: 20px; margin-bottom: 10px;"></a>
        </li>
        </ul>
    </div>

    <div class="car__title">
        <h3 class="car__name"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Title }}</a></h3>
        <span class="car__year"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Year }}</a></span>
    </div>
    <div class="car__footer">
        <span class="car__price">{{ $country->symbol }} {{ $cars->Price * $country->rate }}</span>
    </div>
    </div>
    </div>
    @empty

    @endforelse

    </section>
    <section class="row row--grid">
        <div class="col-12">
            <div class="main__title main__title--first">
                <h2>Popular Bikes</h2>
                <a href="/product-detail-by-category/3" class="main__link">View more <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z" /></svg></a>
            </div>
        </div>
        @forelse ($bikes as $cars)
        <div class="col-12 col-md-6 col-xl-4">
            <div class="car">

                <div class="splide__track">
                    <ul class="splide__list">
                        @php
                        $UserData = \App\Models\UserData::where('ip', $ip)->first('country_id');
                        $country = \App\Models\Country::where('id', $UserData->country_id)->first();
                        $images = \App\Models\Images::where('product_id', $cars->id)->first();
                        @endphp

                        <li class="splide__slide">
                            <a href="/product-detail/{{ $cars->id }}"> <img src="{{ $images->Image }}" alt="{{ $cars->Title }}" style="height: 245px; width: 370px; border-radius: 20px; margin-bottom: 10px;"></a>
                        </li>
                    </ul>
                </div>

                <div class="car__title">
                    <h3 class="car__name"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Title }}</a></h3>
                    <span class="car__year"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Year }}</a></span>
                </div>
                <div class="car__footer">
                    <span class="car__price">{{ $country->symbol }} {{ $cars->Price * $country->rate }}</span>
                </div>
            </div>
        </div>
        @empty
        @endforelse

    </section>
    <section class="row row--grid">
        <div class="col-12">
            <div class="main__title main__title--first">
                <h2>Popular Electric Bikes</h2>
                <a href="/product-detail-by-category/4" class="main__link">View more <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z" /></svg></a>
            </div>
        </div>
        @forelse ($e_bikes as $cars)
        <div class="col-12 col-md-6 col-xl-4">
            <div class="car">



                <div class="splide__track">
                    <ul class="splide__list">
                        @php
                        $UserData = \App\Models\UserData::where('ip', $ip)->first('country_id');
                        $country = \App\Models\Country::where('id', $UserData->country_id)->first();
                        $images = \App\Models\Images::where('product_id', $cars->id)->first();
                        @endphp

                        <li class="splide__slide">
                            <a href="/product-detail/{{ $cars->id }}"> <img src="{{ $images->Image }}" alt="{{ $cars->Title }}" style="height: 245px;  width: 370px; border-radius: 20px; margin-bottom: 10px;"></a>
                        </li>

                    </ul>
                </div>

                <div class="car__title">
                    <h3 class="car__name"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Title }}</a></h3>
                    <span class="car__year"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Year }}</a></span>
                </div>
                <div class="car__footer">
                    <span class="car__price">{{ $country->symbol }} {{ $cars->Price * $country->rate }}</span>
                </div>
            </div>
        </div>
        @empty
        @endforelse

    </section>
    <section class="row row--grid">
        <div class="col-12">
            <div class="main__title main__title--first">
                <h2>Popular BiCycles</h2>
                <a href="/product-detail-by-category/5" class="main__link">View more <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path d="M17.92,11.62a1,1,0,0,0-.21-.33l-5-5a1,1,0,0,0-1.42,1.42L14.59,11H7a1,1,0,0,0,0,2h7.59l-3.3,3.29a1,1,0,0,0,0,1.42,1,1,0,0,0,1.42,0l5-5a1,1,0,0,0,.21-.33A1,1,0,0,0,17.92,11.62Z" /></svg></a>
            </div>
        </div>
        @forelse ($bicycle as $cars)
        <div class="col-12 col-md-6 col-xl-4">
            <div class="car">


                <div class="splide__track">
                    <ul class="splide__list">
                        @php
                        $UserData = \App\Models\UserData::where('ip', $ip)->first('country_id');
                        $country = \App\Models\Country::where('id', $UserData->country_id)->first();
                        $images = \App\Models\Images::where('product_id', $cars->id)->first();
                        @endphp

                        <li class="splide__slide">
                            <a href="/product-detail/{{ $cars->id }}"> <img src="{{ $images->Image }}" alt="{{ $cars->Title }}" style="height: 245px; width: 370px; border-radius: 20px; margin-bottom: 10px;"></a>
                        </li>

                    </ul>
                </div>

                <div class="car__title">
                    <h3 class="car__name"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Title }}</a></h3>
                    <span class="car__year"><a href="/product-detail/{{ $cars->id }}">{{ $cars->Year }}</a></span>
                </div>
                <div class="car__footer">
                    <span class="car__price">{{ $country->symbol }} {{ $cars->Price * $country->rate }}</span>
                </div>
            </div>
        </div>
        @empty
        @endforelse

    </section> --}}

    </div>
</main>
@endsection
