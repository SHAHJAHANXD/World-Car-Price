<style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

</style>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="header__content">
                    <div class="header__logo">
                        <a href="/">
                            <img src="{{ asset('front') }}/logo.png" alt="">
                        </a>
                    </div>

                    <div class="header__menu">
                        <ul class="header__nav">
                            <li class="header__nav-item">
                                <a href="" class="header__nav-link">Search</a>
                            </li>
                            <li class="header__nav-item">
                                <a href="{{ route('wallpapers') }}" class="header__nav-link">Wallpapers</a>
                            </li>
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="#" role="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z" /></svg></a>
                                @php
                                $category = \App\Models\category::get();
                                @endphp
                                <ul class="dropdown-menu header__nav-menu" aria-labelledby="dropdownMenu">
                                    @foreach ($category as $category)
                                    <li><a href="/product-detail-by-category/{{ $category->id }}">{{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="#" role="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Upcoming<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z" /></svg></a>
                                @php
                                $category = \App\Models\category::get();
                                @endphp
                                <ul class="dropdown-menu header__nav-menu" aria-labelledby="dropdownMenu">
                                    @foreach ($category as $category)
                                    <li><a href="/product-detail-by-upcoming/{{ $category->category_name }}">Upcoming {{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="header__nav-item">
                                <a class="header__nav-link" href="#" role="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Top 10<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                        <path d="M17,9.17a1,1,0,0,0-1.41,0L12,12.71,8.46,9.17a1,1,0,0,0-1.41,0,1,1,0,0,0,0,1.42l4.24,4.24a1,1,0,0,0,1.42,0L17,10.59A1,1,0,0,0,17,9.17Z" /></svg></a>
                                @php
                                $category = \App\Models\category::get();
                                @endphp
                                <ul class="dropdown-menu header__nav-menu" aria-labelledby="dropdownMenu">
                                    @foreach ($category as $category)
                                    <li><a href="/product-detail-by-top-10/{{ $category->category_name }}">Top 10 {{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                    </div>



                    <button class="header__btn" type="button">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</header>