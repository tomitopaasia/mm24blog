<section>
    <header>
        <h2 class="card-title">@lang('Delete Account')</h2>
        <p class="text-sm opacity-70">
            @lang('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.')
        </p>
    </header>

    <button type="button" class="btn btn-error mt-4" onclick="confirm_user_deletion.showModal()">
        @lang('Delete Account')
    </button>

    <dialog id="confirm_user_deletion" class="modal">
        <div class="modal-box">
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <h3 class="text-lg font-bold">@lang('Are you sure you want to delete your account?')</h3>
                <p class="py-2 text-sm opacity-70">
                    @lang('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.')
                </p>

                <fieldset class="fieldset">
                    <legend class="fieldset-legend">@lang('Password')</legend>
                    <input id="password" type="password" name="password" placeholder="{{ __('Password') }}"
                        class="input w-full @error('password', 'userDeletion') input-error @enderror">
                    @error('password', 'userDeletion')
                        <p class="label text-error">{{ $message }}</p>
                    @enderror
                </fieldset>

                <div class="modal-action">
                    <button type="button" class="btn" onclick="confirm_user_deletion.close()">@lang('Cancel')</button>
                    <button type="submit" class="btn btn-error">@lang('Delete Account')</button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>@lang('Cancel')</button>
        </form>
    </dialog>

    @if ($errors->userDeletion->isNotEmpty())
        <script>
            confirm_user_deletion.showModal();
        </script>
    @endif
</section>
