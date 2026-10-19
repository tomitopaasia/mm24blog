<section>
    <header>
        <h2 class="card-title">@lang('Update Password')</h2>
        <p class="text-sm opacity-70">@lang('Ensure your account is using a long, random password to stay secure.')</p>
    </header>

    <form method="POST" action="{{ route('password.update') }}" class="mt-4">
        @csrf
        @method('put')

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Current Password')</legend>
            <input id="update_password_current_password" type="password" name="current_password"
                class="input w-full @error('current_password', 'updatePassword') input-error @enderror"
                autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('New Password')</legend>
            <input id="update_password_password" type="password" name="password"
                class="input w-full @error('password', 'updatePassword') input-error @enderror"
                autocomplete="new-password">
            @error('password', 'updatePassword')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <fieldset class="fieldset">
            <legend class="fieldset-legend">@lang('Confirm Password')</legend>
            <input id="update_password_password_confirmation" type="password" name="password_confirmation"
                class="input w-full @error('password_confirmation', 'updatePassword') input-error @enderror"
                autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <p class="label text-error">{{ $message }}</p>
            @enderror
        </fieldset>

        <div class="flex items-center gap-4 mt-4">
            <button type="submit" class="btn btn-primary">@lang('Save')</button>

            @if (session('status') === 'password-updated')
                <div role="alert" class="alert alert-success alert-soft py-2">
                    <span>@lang('Saved.')</span>
                </div>
            @endif
        </div>
    </form>
</section>
