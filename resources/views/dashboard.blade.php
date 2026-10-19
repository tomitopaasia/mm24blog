@extends('partials.layout')
@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-semibold mb-4">@lang('Dashboard')</h1>
        <div class="card bg-base-100 shadow-sm">
            <div class="card-body">
                <p>@lang("You're logged in!")</p>
                <div class="card-actions justify-end">
                    <a class="btn btn-primary" href="{{ route('profile.edit') }}">@lang('Profile')</a>
                </div>
            </div>
        </div>
    </div>
@endsection
