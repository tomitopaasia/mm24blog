@extends('partials.layout')
@section('content')
    <div class="container mx-auto max-w-md my-8">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h1 class="card-title">@lang('Register')</h1>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Name')</legend>
                        <input id="name" type="text" name="name" value="{{ old('name') }}"
                            class="input w-full @error('name') input-error @enderror" required autofocus
                            autocomplete="name">
                        @error('name')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Email')</legend>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            class="input w-full @error('email') input-error @enderror" required autocomplete="username">
                        @error('email')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Password')</legend>
                        <input id="password" type="password" name="password"
                            class="input w-full @error('password') input-error @enderror" required
                            autocomplete="new-password">
                        @error('password')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Confirm Password')</legend>
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            class="input w-full @error('password_confirmation') input-error @enderror" required
                            autocomplete="new-password">
                        @error('password_confirmation')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <div class="flex items-center justify-end gap-2 mt-4">
                        <a class="btn btn-link" href="{{ route('login') }}">@lang('Already registered?')</a>
                        <button type="submit" class="btn btn-primary">@lang('Register')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
