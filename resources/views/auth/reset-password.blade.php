@extends('partials.layout')
@section('content')
    <div class="container mx-auto max-w-md my-8">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h1 class="card-title">@lang('Reset Password')</h1>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Email')</legend>
                        <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}"
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

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-primary">@lang('Reset Password')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
