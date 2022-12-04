@extends('front.layout')
@section('title')
{{ $Products->Title }} Details Page
@endsection
@section('content')
<main class="main">
    <div class="container">
        <section class="row row--grid" style="
        justify-content: center;
        border-radius: 10px;
    box-shadow: 0px 0px 5px 0px #aaa;
    padding: 50px;
    ">
            <div class="col-12">
                @php
                $UserData = \App\Models\UserData::where('ip', $ip)->first('country_id');
                $country = \App\Models\Country::where('id', $UserData->country_id)->first();
                @endphp
            </div>
            <div class="col-12">
                <div class="main__title main__title--page">
                    <h1>{{ $Products->Title }} {{ $Products->Year }}</h1>
                    <span class="offer__price">{{ $country->symbol }} {{ $Products->Price * $country->rate }}</span>
                    <p>
                        {{ $Products->Short_Description }}
                    </p>
                </div>
            </div>
    <div class="row" >

        <div class="col-12 col-lg-6">
            <div class="details">
                <div class="splide splide--details details__slider">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @php
                            $images = \App\Models\Images::where('product_id', $Products->id)->get();
                            $category = \App\Models\category::where('id', $Products->Category)->first();
                            @endphp
                            @foreach ($images as $images)
                            <li class="splide__slide" style="text-align: center">
                                <img class="Car_image" src="{{ $images->Image }}" alt="{{ $Products->Title }}" style="height: 320px;">
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
          <div class="container">
            <div class="row">
                {{-- <div class="col-12 col-lg-4">
                    <div class="offer">
                        <span class="offer__title">Browse By Brands</span>
                        <div class="offer__wrap">
                            <span class="offer__price">${{ $Products->Price }}</span>
                            <button class="offer__favorite" type="button" aria-label="Add to favorite"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                    <path d="M20.16,5A6.29,6.29,0,0,0,12,4.36a6.27,6.27,0,0,0-8.16,9.48l6.21,6.22a2.78,2.78,0,0,0,3.9,0l6.21-6.22A6.27,6.27,0,0,0,20.16,5Zm-1.41,7.46-6.21,6.21a.76.76,0,0,1-1.08,0L5.25,12.43a4.29,4.29,0,0,1,0-6,4.27,4.27,0,0,1,6,0,1,1,0,0,0,1.42,0,4.27,4.27,0,0,1,6,0A4.29,4.29,0,0,1,18.75,12.43Z" /></svg></button>
                            <a href="#rent-modal" class="offer__rent open-modal"><span>Rent now</span></a>
                        </div>
                        <span class="offer__title">Car Details</span>
                        <ul class="offer__list">
                            <li>
                                <span class="offer__list-name">Category</span>
                                <span class="offer__list-value offer__list-value--dark">{{ $category->category_name }}</span>
                            </li>
                            <li>
                                <span class="offer__list-name">Brand</span>
                                <span class="offer__list-value">{{ $Products->Brand }}</span>
                            </li>
                            <li>
                                <span class="offer__list-name">Product Status</span>
                                <span class="offer__list-value">{{ $Products->Product_status }}</span>
                            </li>
                            <li>
                                <span class="offer__list-name">Model Year</span>
                                <span class="offer__list-value">{{ $Products->Year }}</span>
                            </li>
                        </ul>

                    </div>
                </div> --}}
                <div class="col-12 col-lg-8">
                    <div class="offer">
                        <span class="offer__title">{{ $Products->Title }} Specification</span>
                        <p>
                           <div class="row" style="    box-shadow: 0px 0px 5px 0px #aaa;
                           border-radius: 10px;
                           padding: 50px;">
                            {!! $Products->Description !!}
                           </div>
                        </p>
                    </div>
                </div>
            </div>
          </div>
        </section>
    </div>
</main>
@endsection
