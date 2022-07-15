@extends('template.web')

@section('title', 'category_games')

@section('main-content')
    <div class="section-header flex-col">
        <h1 class="title-section mb-8  self-start">Select Category Games</h1>
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

    <div class="form-data card">

        <div class="card-body">

            <form action="{{ route('category-games.store') }}" method="post" autocomplete="off">
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

                <div class="divider my-6 text-white">Category</div>

                <div class="form-control">
                    <label for="title_game" class="label mb-2">
                        <span class="label-text">Select Category</span>
                    </label>
                    <select class="select w-full max-w-xs" name="category_id">
                        <option disabled selected>Select category</option>
                        @foreach ($DataCategory as $data)
                            <option value="{{ $data['id'] }}">{{ $data['name_category'] }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" name="submit-form" class="btn btn-secondary mt-3">Add Category</button>

            </form>


        </div>

    </div>

    <input type="checkbox" id="edit-modal" class="modal-toggle" />
    <div class="modal">

        <div class="modal-box form-data">
            <label for="edit-modal" class="btn btn-square btn-ghost btn-sm mb-5 ml-auto">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </label>
            <form id="category-form" method="post">
                @method('PUT')
                @csrf

                <div class="form-control">
                    <label for="name_category" class="label">
                        <span class="label-text">Name Category</span>
                    </label>
                    <input type="text" name="name_category" id="name-category" class="input-form input input-bordered"
                        placeholder="input category name">
                </div>

                <span class="badge-note">
                    Note : You Cannot Add New Category Already Exist
                </span>

                <button type="submit" name="submit-form" class="btn btn-secondary">Create Data</button>

            </form>
        </div>
    </div>

@endsection
