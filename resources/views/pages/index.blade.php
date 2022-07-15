@extends('template.web')

@section('title', 'GoodGamers')

@section('main-content')

    {{-- <section class="section-header mb-10">
        <form action="" class="search-header" autocomplete="off">
            <div class="search-game">
                <input type="text" placeholder="Search Game" class="form-control input w-full">
                <button type="submit">
                    <i class='bx bx-search icon-search'></i>
                </button>
            </div>
        </form>

    </section> --}}

    <section class="slider-section">
        <h1 class="title-section">Discover Game</h1>

        <div class="swiper banner-card">
            <div class="swiper-wrapper">
                @foreach ($gamelistBanner as $data)
                    <figure class="swiper-slide">
                        <img src="{{ url('storage/' . $data->bannerGame->banner_photo) }}" alt="banner-img"
                            class="img-banner">
                        <div class="gradient-img"></div>
                        <figcaption class="data-banner">
                            <div class="mb-8">
                                <h2 class="title-banner">{{ $data['title_game'] }}</h2>
                                <p class="price-banner">
                                    @if ($data['price'] == 1)
                                        {{ 'free' }}
                                    @else
                                        IDR.{{ number_format($data['price']) }}
                                    @endif
                                </p>
                                <p class="description">
                                    {{ $data['story_game'] }}
                                </p>
                            </div>
                        </figcaption>
                    </figure>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <section class="new-release-section">
            <h6 class="title-second-section">New Release</h6>

            <div class="grid lg:grid-cols-5 grid-cols-2 gap-4">
                @foreach ($gameList as $game)
                    <div class="gamelist-item">
                        <a href="{{ route('product', $game['slug']) }}">
                            <div class="img-thumbnail">
                                <img src="{{ url('storage/' . $game['photo_cover']) }}" class="img-game" alt="image-game">
                            </div>
                            <div class="data-game">
                                <h4 class="title-game">{{ $game['title_game'] }}</h4>
                                <p class="price-game">
                                    @if ($game['price'] == 1)
                                        {{ 'free' }}
                                    @else
                                        IDR.{{ number_format($game['price']) }}
                                    @endif
                                </p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

        </section>

    </section>


@endsection

@section('footer')
