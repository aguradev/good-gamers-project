@extends('template.web-login')

@section('title', 'GoodGamers - Register')

@section('main-content')

@section('main-content')
    <div class="layout-grid">
        <div class="register-section container mx-auto px-5 lg:max-w-xl">
            <form action="{{ url('/register') }}" autocomplete="off" method="post">
                @csrf

                <div class="grid lg:grid-cols-2 lg:gap-x-5">
                    <div class="form-control">
                        <label for="usernamme" class="label">User name</label>
                        <input type="text" name="username" id="username" class="input input-bordered"
                            placeholder="input username" value="{{ old('username') }}">
                        @error('username')
                            <label for="username" class="label-text-alt">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                    <div class="form-control">
                        <label for="fullName" class="label">Full Name</label>
                        <input type="text" name="fullName" id="fullName" class="input input-bordered"
                            placeholder="input Full Name" value="{{ old('fullName') }}">
                        @error('fullName')
                            <label for="fullName" class="label-text-alt">
                                {{ $message }}
                            </label>
                        @enderror
                    </div>
                </div>
                <div class="form-control">
                    <label for="email" class="label">Email</label>
                    <input type="text" name="email" id="email" class="input input-bordered"
                        placeholder="example@gmail.com" value="{{ old('email') }}">
                    @error('email')
                        <label for="email" class="label-text-alt">
                            {{ $message }}
                        </label>
                    @enderror
                </div>
                <div class="form-control password-form">
                    <label for="password" class="label">Password</label>
                    <input type="password" name="password" id="password" class="input input-bordered"
                        placeholder="Password">
                    @error('password')
                        <label for="password" class="label-text-alt">
                            {{ $message }}
                        </label>
                    @enderror

                </div>
                <div class="form-control password-form">
                    <label for="password" class="label">Confirm Password</label>
                    <input type="password" name="confirm-password" id="password_confirm" class="input input-bordered"
                        placeholder="Confirm Password">
                    @error('confirm_password')
                        <label for="password-confirm" class="label-text-alt">
                            {{ $message }}
                        </label>
                    @enderror

                </div>
                <button type=" submit" class="btn-submit">Register Now</button>
            </form>
            <span class="text-center block mt-8 text-sm"> Already Account ? <a href="{{ url('/login') }}"
                    class="link-secondary link-hover">Sign Up</a></span>
        </div>
        <div class="background-section">
            <div class="logo-content mx-auto max-w-sm">
                <img src="{{ url('storage/assets/logo-white.png') }}" alt="logo-white">
                <h1 class="logo-text">Welcome To
                    GoodGamers.id</h1>
            </div>
        </div>
    </div>
@endsection
