@extends('partials.layout')
@section('content')
    <div class="container mx-auto my-8 space-y-6">
        <h1 class="text-2xl font-semibold">@lang('Profile')</h1>

        <div class="card bg-base-100 shadow-sm">
            <div class="card-body max-w-xl">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        <div class="card bg-base-100 shadow-sm">
            <div class="card-body max-w-xl">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        <div class="card bg-base-100 shadow-sm">
            <div class="card-body max-w-xl">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
    </div>
@endsection
