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
            <div class="col-12 col-md-6 col-lg-4 col-xl-4">
                <div class="car">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @php
                            $images = \App\Models\FalseCeilingImages::where('category', $FalseCeilingImages->id)->first();
                            @endphp
                            <li class="splide__slide">
                                <img src="{{ $images->Image ?? ''}}" alt="Ceiling Images" style="height: 245px; width: 330px; border-radius: 20px; margin-bottom: 10px;">
                            </li>
                        </ul>
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
