@extends('front.layout')
@section('title')
 Details Page
@endsection
@section('content')
<main class="main">
    <div class="container">
        <section class="row row--grid">
            <div class="col-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb__item"><a href="/">Home</a></li>

                </ul>
            </div>
            @forelse ($FalseCeiling as $FalseCeilingImages)
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="car">
                    <div class="splide__track">
                        <ul class="splide__list">

                            <li class="splide__slide">
                                <img src="{{ $FalseCeilingImages->Image }}" alt="Ceiling Images" style="height: 430px; width: 430px; border-radius: 20px; margin-bottom: 10px;">
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
            <!-- end offer -->
        </section>
    </div>
</main>
@endsection
