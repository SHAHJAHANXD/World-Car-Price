<div class="row">
    @forelse ($FalseCeiling as $FalseCeilingImages)
    <div class="col-12 col-md-6 col-lg-4 col-xl-4">
        <div class="car">
            <div class="splide__track">
                <ul class="splide__list">

                    <li class="splide__slide">
                        <img src="{{ $FalseCeilingImages->Image }}" alt="Ceiling Images"
                            style="  height: 350px;
            width: 350px;
            border-radius: 20px;
            margin-bottom: 10px;"
                            class="wallpaper_image">
                    </li>
                </ul>
            </div>
        </div>
    </div>
@empty
@endforelse

</div>
