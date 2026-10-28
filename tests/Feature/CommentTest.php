<?php

use App\Models\Post;
use App\Models\User;

test('guests do not see the comment form', function () {
    $post = Post::factory()->for(User::factory())->create();

    $this->get(route('post', $post))
        ->assertOk()
        ->assertDontSee(route('comments.store', $post));
});

test('logged in users see the comment form', function () {
    $user = User::factory()->create();
    $post = Post::factory()->for($user)->create();

    $this->actingAs($user)
        ->get(route('post', $post))
        ->assertOk()
        ->assertSee(route('comments.store', $post));
});

test('empty comment shows a validation error', function () {
    $user = User::factory()->create();
    $post = Post::factory()->for($user)->create();

    $this->actingAs($user)
        ->from(route('post', $post))
        ->post(route('comments.store', $post), ['body' => ''])
        ->assertRedirect(route('post', $post))
        ->assertSessionHasErrors('body');

    expect($post->comments()->count())->toBe(0);
});

test('comment is saved and shown with author name', function () {
    $user = User::factory()->create(['name' => 'Kommenteerija']);
    $post = Post::factory()->for($user)->create();

    $this->actingAs($user)
        ->post(route('comments.store', $post), ['body' => 'Väga hea postitus!'])
        ->assertRedirect(route('post', $post));

    $this->get(route('post', $post))
        ->assertSee('Väga hea postitus!')
        ->assertSee('Kommenteerija');
});

test('guests cannot post comments', function () {
    $post = Post::factory()->for(User::factory())->create();

    $this->post(route('comments.store', $post), ['body' => 'Tere'])
        ->assertRedirect(route('login'));
});
