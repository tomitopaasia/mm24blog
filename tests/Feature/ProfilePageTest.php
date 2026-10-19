<?php

use App\Models\User;

test('profile page uses daisyUI forms and no blade components', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get('/profile')
        ->assertOk()
        ->assertSee('fieldset-legend', false)
        ->assertSee('<dialog id="confirm_user_deletion" class="modal">', false)
        ->assertDontSee('<x-', false);
});

test('profile page shows saved alerts from the session', function (string $status) {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->withSession(['status' => $status])
        ->get('/profile')
        ->assertSee('alert alert-success', false);
})->with(['profile-updated', 'password-updated']);

test('password errors are shown from the updatePassword bag', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->from('/profile')->put('/password', [
        'current_password' => 'wrong-password',
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ]);

    $this->actingAs($user)->get('/profile')
        ->assertSee('input-error', false)
        ->assertSee('label text-error', false);
});

test('delete modal opens again when the password is wrong', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->from('/profile')->delete('/profile', ['password' => 'wrong-password']);

    $this->actingAs($user)->get('/profile')
        ->assertSee('confirm_user_deletion.showModal();', false);
});

test('dashboard renders without blade components', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get('/dashboard')
        ->assertOk()
        ->assertDontSee('<x-', false);
});
