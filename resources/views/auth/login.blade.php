@extends('partials.layout')
@section('content')
    <div class="container mx-auto max-w-md my-8">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h1 class="card-title">@lang('Log in')</h1>

                @if (session('status'))
                    <div role="alert" class="alert alert-success alert-soft">
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Email')</legend>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            class="input w-full @error('email') input-error @enderror" required autofocus
                            autocomplete="username">
                        @error('email')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Password')</legend>
                        <input id="password" type="password" name="password"
                            class="input w-full @error('password') input-error @enderror" required
                            autocomplete="current-password">
                        @error('password')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <label class="label my-4">
                        <input type="checkbox" name="remember" class="checkbox">
                        @lang('Remember me')
                    </label>

                    <div class="flex items-center justify-end gap-2">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">@lang('Forgot your password?')</a>
                        @endif
                        <button type="submit" class="btn btn-primary">@lang('Log in')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
