<section>
    <header>
        <h2 class="card-title">@lang('Profile Information')</h2>
        <p class="text-sm opacity-70">@lang("Update your account's profile information and email address.")</p>
    </header>

    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="POST" action="{{ route('profile.update') }}" class="mt-4">
        @csrf
        @method('patch')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Name')</legend>
            <input id="name" type="text" name="name" value="{{ old('name', $user->name) }}"
                class="input w-full @error('name') input-error @enderror" required autofocus autocomplete="name">
            @error('name')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Email')</legend>
            <input id="email" type="email" name="email" value="{{ old('email', $user->email) }}"
                class="input w-full @error('email') input-error @enderror" required autocomplete="username">
            @error('email')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div role="alert" class="alert alert-warning alert-soft mt-2">
                <span>@lang('Your email address is unverified.')</span>
                <button form="send-verification" class="btn btn-sm btn-link">
                    @lang('Click here to re-send the verification email.')
                </button>
            </div>

            @if (session('status') === 'verification-link-sent')
                <div role="alert" class="alert alert-success alert-soft mt-2">
                    <span>@lang('A new verification link has been sent to your email address.')</span>
                </div>
            @endif
        @endif

        <div class="flex items-center gap-4 mt-4">
            <button type="submit" class="btn btn-primary">@lang('Save')</button>

            @if (session('status') === 'profile-updated')
                <div role="alert" class="alert alert-success alert-soft py-2">
                    <span>@lang('Saved.')</span>
                </div>
            @endif
        </div>
    </form>
</section>
