@extends('partials.layout')
@section('content')
    <div class="container mx-auto max-w-md my-8">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h1 class="card-title">@lang('Confirm Password')</h1>
                <p class="text-sm opacity-70">
                    @lang('This is a secure area of the application. Please confirm your password before continuing.')
                </p>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <fieldset class="fieldset">
                        <legend class="fieldset-legend">@lang('Password')</legend>
                        <input id="password" type="password" name="password"
                            class="input w-full @error('password') input-error @enderror" required autofocus
                            autocomplete="current-password">
                        @error('password')
                            <p class="label text-error">{{ $message }}</p>
                        @enderror
                    </fieldset>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="btn btn-primary">@lang('Confirm')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
