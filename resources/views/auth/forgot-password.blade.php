@extends('partials.layout')
@section('content')
    <div class="container mx-auto max-w-md my-8">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h1 class="card-title">@lang('Forgot your password?')</h1>
                <p class="text-sm opacity-70">
                    @lang('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')
                </p>

                @if (session('status'))
                    <div role="alert" class="alert alert-success alert-soft">
                        <span>{{ session('status') }}</span>
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Email')</legend>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            class="input w-full @error('email') input-error @enderror" required autofocus>
                        @error('email')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <div class="flex items-center justify-end gap-2 mt-4">
                        <a class="btn btn-link" href="{{ route('login') }}">@lang('Log in')</a>
                        <button type="submit" class="btn btn-primary">@lang('Email Password Reset Link')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
