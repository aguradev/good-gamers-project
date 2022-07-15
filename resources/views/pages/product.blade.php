@extends('template.web')

@section('title', 'GoodGamers')

@section('main-content')

    <section class="product-page">
        <div class="header-page"
            style="background: linear-gradient(0deg, rgba(8,9,16,.6) 0%, rgba(8,9,16,.4) 100%), url({{ url('storage/' . $datagames->bannerGame->banner_photo) }}); background-size:cover;">
            <div class="header-data">
                <h1 class="title-game-product">{{ $datagames->title_game }}</h1>
                <h6 class="price-game">
                    @if ($datagames->price == 1)
                        {{ 'free' }}
                    @else
                        IDR.{{ number_format($datagames->price) }}
                    @endif
                </h6>
                <p class="story-game-product">
                    {{ $datagames->story_game }}
                </p>
            </div>
        </div>

        <div class="about-content">
            <div class="story-genre-information">
                <div class="data-about-content col-span-2">
                    <h4 class="title-about-game">About the game</h4>
                    <p class="description-about-game">
                        {{ $datagames->story_game }}
                    </p>
                </div>
                <div class="more-data-game col-span-1">
                    <ul class="information-list">
                        <li>Genre :</li>
                    </ul>
                    <ul class="value-information">
                        <li>{{ $dataCategory->name_category }}</li>
                    </ul>
                </div>
            </div>

            <div class="swiper slider-game">
                <div class="swiper-wrapper">
                    @foreach ($datagames->galleries as $gallery)
                        <div class="swiper-slide">
                            <img src="{{ url('storage/' . $gallery->gallery_images) }}" alt="game-screenshoot"
                                class="image-slider">
                        </div>
                    @endforeach
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>


        </div>

    </section>

@endsection
