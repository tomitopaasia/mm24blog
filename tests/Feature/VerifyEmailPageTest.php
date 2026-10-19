<?php

use App\Models\User;

test('unverified user is sent to the verify email page', function () {
    $user = User::factory()->unverified()->create();

    $this->actingAs($user)->get('/dashboard')->assertRedirect('/verify-email');
});

test('verify email page shows an alert after the link is resent', function () {
    $user = User::factory()->unverified()->create();

    $this->actingAs($user)
        ->post('/email/verification-notification')
        ->assertRedirect()
        ->assertSessionHas('status', 'verification-link-sent');

    $this->actingAs($user)
        ->withSession(['status' => 'verification-link-sent'])
        ->get('/verify-email')
        ->assertSee('alert alert-success', false)
        ->assertDontSee('<x-', false);
});
