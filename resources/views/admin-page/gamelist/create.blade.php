@extends('template.web')

@section('title', 'create game list')

@section('main-content')

    <div class="section-header flex-col">
        <h1 class="title-section mb-8  self-start">Create New Gamelist</h1>
        @if ($errors->any())
            @foreach ($errors->all() as $messages)
                <div class="alert alert-error shadow-lg mb-8 w-1/2 self-start">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ $messages }}</span>
                    </div>
                </div>
            @endforeach
        @endif
        @if (session('success_message'))
            <div class="alert alert-success shadow-lg mb-12 w-1/2 self-start">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>{{ session('success_message') }}</span>
                </div>
            </div>
        @endif
    </div>

    <section class="form-data form-data-gamelist card">
        <div class="card-body">

            <form action="{{ route('gamelist-data.store') }}" method="post" enctype="multipart/form-data"
                autocomplete="off">

                @csrf

                <div class="form-group ">
                    <div class="form-control">
                        <label for="title_game" class="label mb-2">
                            <span class="label-text">Title Game</span>
                        </label>
                        <input type="text" name="title_game" id="title-game" class="input-form input input-bordered"
                            placeholder="input title game" value="{{ old('title_game') }}">
                    </div>
                    <div class="form-control">
                        <label for="title_game" class="label mb-2">
                            <span class="label-text">Price</span>
                        </label>
                        <input type="number" name="price" id="title-game" class="input-form input input-bordered"
                            placeholder="input price" value="{{ old('price') }}">
                        <span class="badge-note mb-2 badge-resolution mt-5">
                            input 1 for free games
                        </span>
                    </div>
                </div>

                <div class="form-control">
                    <label for="Story Game" class="label mb-2">
                        <span class="label-text">Story Game</span>
                    </label>
                    <textarea name="story_game" id="story-game" class="textarea textarea-bordered" cols="30" rows="10"></textarea>
                </div>

                <div class="img-thumbnail-form">
                    <img class="image-form" id="display-image">
                </div>

                <span class="badge-note mb-2 badge-resolution">
                    Recommended Resolution : 1200 x 1600
                </span>

                <div class="form-control">
                    <label for="photo_cover" class="label">
                        <span class="label-text">Photo Cover</span>
                    </label>
                    <input type="file" name="photo_cover" id="image_input" class="input-file">
                </div>

                <div class="divider my-6 text-white">Banner</div>

                <div class="img-thumbnail-form w-full img-banner-preview">
                    <img class="image-form" id="display-banner">
                </div>

                <span class="badge-note mb-2 badge-resolution">
                    Recommended Resolution : 1500 x 844
                </span>

                <div class="form-control">
                    <label for="photo_cover" class="label">
                        <span class="label-text">Banner</span>
                    </label>
                    <input type="file" name="banner_photo" id="banner_input" class="input-file">
                </div>


                <button type="submit" name="submit-form" class="btn btn-secondary mt-8">Create Games</button>

            </form>

        </div>
    </section>

@endsection
