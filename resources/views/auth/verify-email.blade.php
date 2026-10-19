@extends('partials.layout')
@section('content')
    <div class="container mx-auto max-w-md my-8">
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <h1 class="card-title">@lang('Verify Email Address')</h1>
                <p class="text-sm opacity-70">
                    @lang('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.')
                </p>

                @if (session('status') === 'verification-link-sent')
                    <div role="alert" class="alert alert-success alert-soft">
                        <span>@lang('A new verification link has been sent to the email address you provided during registration.')</span>
                    </div>
                @endif

                <div class="flex items-center justify-between gap-2 mt-4">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">@lang('Resend Verification Email')</button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link">@lang('Log Out')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
