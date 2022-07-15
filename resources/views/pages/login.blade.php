@extends('template.web-login')

@section('title', 'GoodGamers - Login')

@section('main-content')

    <div class="layout-grid">
        <div class="login-section container mx-auto px-5 lg:max-w-md">
            @if ($errors->any())
                <div class="alert alert-error shadow-lg mb-12 w-full self-start">
                    @foreach ($errors->all() as $messages)
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>{{ $messages }}</span>
                        </div>
                    @endforeach
                </div>
            @endif
            @if (session('success_message'))
                <div class="alert alert-success shadow-lg mb-12 w-full self-start">
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
            @if (session('loginError'))
                <div class="alert alert-warning shadow-lg mb-12 w-full self-start">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span>{{ session('loginError') }}</span>
                    </div>
                </div>
            @endif
            <div class="header">
                <h1 class="text-header">Sign In</h1>
                <p>Welcome User.</p>
            </div>
            <form action="/login" method="post" autocomplete="off">
                @csrf

                <div class="form-control">
                    <label for="username" class="label">username</label>
                    <input type="text" name="username" id="username" class="input input-bordered" placeholder="username"
                        autofocus>

                </div>
                <div class="form-control password-form">
                    <label for="password" class="label">Password</label>
                    <input type="password" name="password" id="password" class="input input-bordered"
                        placeholder="Password">
                    <label class="swap swap-rotate show-hide-password">
                        <input type="checkbox" name="password-show-hide" id="password-show-hide">

                        <box-icon class="swap-off" type='solid' name='hide' color="#fff"></box-icon>
                        <box-icon class="swap-on" name='show' type='solid' color='#fff'></box-icon>
                    </label>

                </div>
                <button type=" submit" class="btn-submit">Sign
                    In</button>
            </form>
            <span class="text-center block mt-8 text-sm">No Already Account ? <a href="{{ url('/register') }}"
                    class="link-secondary link-hover">Create An
                    Account</a></span>
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
