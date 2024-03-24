{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
@extends('layouts.client')
@section('title')
    Sign in
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('assets/clients/css/auth.css') }}">
@endsection
@section('content1')
<main class="auth row">
    <!-- Auth intro -->
    <div class="auth__intro col-6">
        <img src="{{ asset('assets/clients/images/helmet_1.png') }}" alt="" class="auth__intro-img" />
        <p class="auth__intro-text">
            The best of luxury brand values, high quality products, and innovative services
        </p>
    </div>

    <!-- Auth content -->
    <div class="auth__content col-6">
        <div class="auth__content-inner">
            <a href="{{route('home')}}" class="logo d-flex align-items-center">
                <img src="{{asset('assets\clients\images\logo.png')}}" alt="SafeTech" style="width:60px"class="logo__img" />
                <h2 class="logo__title">SafeTech</h2>
            </a>
            <h1 class="auth__heading">Hello Again!</h1>
            <p class="auth__desc">
                Welcome back to sign in. As a returning customer, you have access to your previously saved all
                information.
            </p>
            <form method="POST" action="{{ route('login') }}"  class="form auth__form">
                @csrf
                <div class="form__group">
                    <div class="form__text-input">
                        <input
                            type="email"
                            name="email"id="email" placeholder="Email" class="form__input" value="{{ old('email') }}" autofocus required
                        />
                        <i class="fas fa-envelope" class="form__input-icon"></i>
                    
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="messages__error" />
                </div>
                <div class="form__group">
                    <div class="form__text-input">
                        
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Password"
                            class="form__input"
                            required
                            autocomplete="current-password"
                            minlength="6"
                        />
                        <i class="fas fa-lock" class="form__input-icon" ></i>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="messages__error" />
                    
                </div>
                <div class="form__group form__group--inline d-flex justify-content-between">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="form__checkbox-input" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                    @if (Route::has('password.request'))
                    <a class="auth__link form__pull-right" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                    @endif
                   
                </div>
                <div class="form__group auth__btn-group">
                    <button class="btn btn--primary auth__btn form__submit-btn">Sign In</button>
                </div>
            </form>

            <p class="auth__text ">
                Don’t have an account yet?
                <a href="./sign-up.html" class="auth__link auth__text-link">Sign Up</a>
            </p>
        </div>
    </div>
</main>
@endsection