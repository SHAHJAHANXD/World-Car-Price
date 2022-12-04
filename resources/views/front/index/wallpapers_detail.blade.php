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
            </section>
            <div class="row" style="    text-align: center;">
                {{-- <div class="col-12">
                    <a href="/wallpapers-detail/15?page=2"
                        style="    cursor: pointer;
                    padding: 10px;
                    background: red;
                    color: white;
                    font-weight: 700;
                    border-radius: 5px;">
                        Load More </a>

                </div> --}}
                <div id="prevnext">
                    <ul>
                        <a href="" id="next">next</a>
                        <!--it will go to page-3-->
                        <a href="" id="prev">previous</a>
                        <!--it will go to page-1-->
                    </ul>
                </div>
            </div>
        </div>
    </main>
@endsection
<script>
    // Check that a resource exists at url; if so, execute callback
    function checkResource(url, callback) {
        var check = new XMLHttpRequest();
        check.addEventListener("load", function(e) {
            if (check.status === 200) callback();
        });
        check.open("HEAD", url);
        check.send();
    }

    // Get next or previous path
    function makePath(sign) {
        // location.pathname gets/sets the browser's current page
        return location.pathname.replace(
            // Regular expression to extract page number
            /(\/page\-)(\d+)/,
            function(match, base, num) {
                // Function to increment/decrement the page number
                return base + (parseInt(num) + sign);
            }
        );
    }

    function navigate(path) {
        location.pathname = path;
    }

    var nextPath = makePath(1),
        prevPath = makePath(-1);

    checkResource(nextPath, function() {
        // If resource exists at nextPath, add the click listener
        document.getElementById('next')
            .addEventListener('click', navigate.bind(null, nextPath));
    });
    checkResource(prevPath, function() {
        // If resource exists at prevPath, add the click listener
        document.getElementById('prev')
            .addEventListener('click', navigate.bind(null, prevPath));
    });
</script>
