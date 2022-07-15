@extends('template.web')

@section('title', 'Gallery')

@section('main-content')
    <div class="section-header flex-col">
        <h1 class="title-section mb-8  self-start">Gallery</h1>
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

    <section class="form-data form-data-full card">
        <div class="card-body w-full">
            <form action="{{ route('galleries.store') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
                @csrf

                <div class="form-control">
                    <label for="gamelist" class="label">
                        <span class="label-text">Select Game Available</span>
                    </label>
                    <select class="select w-full max-w-xs" name="games_id">
                        <option disabled selected>Select Game</option>
                        @foreach ($DataGames as $list)
                            <option value="{{ $list['id'] }}">{{ $list['title_game'] }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="img-thumbnail-form img-banner-preview">
                    <img class="image-form" id="display-image">
                </div>

                <span class="badge-note mb-2 badge-resolution">
                    Recommended Resolution : 600 x 337
                </span>

                <div class="form-control">
                    <label for="gallery_images" class="label">
                        <span class="label-text">Upload Images</span>
                    </label>
                    <input type="file" name="gallery_images" id="image_input" class="input-file">
                </div>


                <button type="submit" name="submit-form" class="btn btn-secondary">Create Data</button>

            </form>
        </div>
    </section>

    <div class="table-section">
        <h1 class="title-section">Game List Table</h1>

        <div class="overflow-x-auto">
            <table class="table table-zebra w-full">

                {{-- head --}}
                <thead>
                    <tr class="text-center">
                        <th>Gallery Images</th>
                        <th>Action</th>
                    </tr>
                </thead>

                {{-- tbody --}}
                <tbody>
                    @foreach ($galleries as $item)
                        <tr class="text-center ">
                            <td>
                                <img src="{{ url('storage/' . $item['gallery_images']) }}" class="image-table"
                                    width="250">
                            </td>
                            <td class="flex justify-center">
                                <a href="#" class="badge badge-secondary">Delete</a>
                                <div class="divider divider-horizontal"></div>
                                <a href="#" class="badge badge-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

@endsection
