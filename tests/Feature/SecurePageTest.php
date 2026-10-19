<?php

use App\Models\User;

test('secure page asks for password confirmation', function () {
    $user = User::factory()->create();

    $this->actingAs($user)->get('/secure')->assertRedirect('/confirm-password');

    $this->actingAs($user)->get('/confirm-password')
        ->assertOk()
        ->assertSee('fieldset-legend', false)
        ->assertDontSee('<x-', false);
});

test('secure page is shown after password is confirmed', function () {
    $user = User::factory()->create();

    $this->actingAs($user)
        ->withSession(['auth.password_confirmed_at' => time()])
        ->get('/secure')
        ->assertOk();
});

test('login page shows session status as an alert', function () {
    $this->withSession(['status' => 'Your password has been reset.'])
        ->get('/login')
        ->assertSee('alert alert-success', false)
        ->assertSee('Your password has been reset.');
});

test('login page has no alert without session status', function () {
    $this->get('/login')->assertDontSee('alert-success', false);
});
