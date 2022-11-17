@extends('front.layout')
@section('title')
World Car Price
@endsection
@section('content')
<main class="main">
    <div class="container">
        <div class="row" style="justify-content: center;">
            <div class="col-12 col-lg-6">
                <form action="#" class="sign__form sign__form--profile">
                    <div class="row">
                        <div class="sign__group col-8">
                            <input id="" type="text" name="" class="sign__input" placeholder="Product Search">
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
        <section class="row row--grid">
            <div class="col-12">
                <div class="main__title main__title--first">
                    <h2>Popular False Ceilings</h2>
                </div>
            </div>
            @forelse ($FalseCeiling as $FalseCeilingImages)
            <div class="col-12 col-md-6 col-xl-4">
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
                                $images = \App\Models\FalseCeilingImages::where('false_id', $FalseCeilingImages->id)->get();
                                @endphp
                                @foreach ($images as $images)
                                <li class="splide__slide">
                                    <img src="{{ $images->Image }}" alt="{{ $FalseCeilingImages->title }}" style="height: 245px;">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="car__title">
                        <h3 class="car__name"><a href="/wallpapers-detail/{{ $FalseCeilingImages->id }}">{{ $FalseCeilingImages->title }}</a></h3>

                    </div>
                </div>
            </div>
            @empty
            @endforelse

        </section>
    </div>
</main>
@endsection
