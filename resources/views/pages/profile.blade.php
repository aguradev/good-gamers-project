@extends('template.web')

@section('title', 'Profile Page')

@section('main-content')
    <div class="section-header flex-col">
        <h1 class="title-section mb-8  self-start">Profile</h1>
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
            <form action="{{ route('profile-update', $User['username']) }}" method="POST" autocomplete="off"
                enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <div class="profile-picture-name">
                    <div class="img-thumbnail">
                        @if ($User->profile_image == 'profile.png')
                            <img src="{{ url('storage/assets/' . $User->profile_image) }}" class="img-profile"
                                id="img_profile">
                        @else
                            <img src="{{ url('storage/' . $User->profile_image) }}" class="img-profile" id="img_profile">
                        @endif

                    </div>
                    <div class="data-content">
                        <h1 class="profile-title">{{ $User->fullName }}</h1>
                        <h1 class="profile-roles">{{ $User->roles }}</h1>
                    </div>
                </div>

                <span class="badge-note mb-2 badge-resolution">
                    Recommended Resolution : 200 x 200
                </span>

                <div class="form-control">
                    <label for="photo_cover" class="label">
                        <span class="label-text">Photo Profile</span>
                    </label>
                    <input type="file" name="profile_image" id="image_input" class="input-file">
                </div>

                <div class="divider my-8">Profile Data</div>

                <input type="hidden" name="old_images_profile" value="{{ $User->profile_image }}">

                <div class="form-control">
                    <label for="fullName" class="label mb-2">
                        <span class="label-text">Full Name</span>
                    </label>
                    <input type="text" name="fullName" id="full-name" class="input-form input input-bordered"
                        placeholder="input fullName" value="{{ $User->fullName }}">
                </div>
                <div class="form-control">
                    <label for="username" class="label mb-2">
                        <span class="label-text">Username</span>
                    </label>
                    <input type="text" name="username" id="user-name" class="input-form input input-bordered"
                        placeholder="input username" value="{{ $User->username }}">
                </div>
                <div class="form-control">
                    <label for="email" class="label mb-2">
                        <span class="label-text">email</span>
                    </label>
                    <input type="text" name="email" id="email" class="input-form input input-bordered"
                        placeholder="input email" value="{{ $User->email }}">
                </div>



                <button type="submit" name="submit-form" class="btn btn-secondary mt-3">Change Profile</button>

            </form>
        </div>
    </section>
@endsection
