<?php

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

test('guests cannot open tags admin', function () {
    $this->get(route('tags.index'))->assertRedirect(route('login'));
});

test('tags index lists tags with post count', function () {
    $user = User::factory()->create();
    $tag = Tag::factory()->create(['name' => 'laravel']);
    $tag->posts()->attach(Post::factory(3)->for($user)->create());

    $this->actingAs($user)
        ->get(route('tags.index'))
        ->assertOk()
        ->assertSee('laravel')
        ->assertSee('3')
        ->assertSee(route('tags.create'));
});

test('tag can be created', function () {
    $this->actingAs(User::factory()->create())
        ->post(route('tags.store'), ['name' => 'php'])
        ->assertRedirect(route('tags.index'));

    expect(Tag::where('name', 'php')->exists())->toBeTrue();
});

test('tag name is required and unique', function () {
    Tag::factory()->create(['name' => 'php']);
    $user = User::factory()->create();

    $this->actingAs($user)
        ->post(route('tags.store'), ['name' => ''])
        ->assertSessionHasErrors('name');

    $this->actingAs($user)
        ->post(route('tags.store'), ['name' => 'php'])
        ->assertSessionHasErrors('name');

    expect(Tag::where('name', 'php')->count())->toBe(1);
});

test('tag can be updated and may keep its own name', function () {
    $user = User::factory()->create();
    $tag = Tag::factory()->create(['name' => 'php']);
    Tag::factory()->create(['name' => 'js']);

    $this->actingAs($user)
        ->put(route('tags.update', $tag), ['name' => 'php'])
        ->assertSessionHasNoErrors();

    $this->actingAs($user)
        ->put(route('tags.update', $tag), ['name' => 'js'])
        ->assertSessionHasErrors('name');

    $this->actingAs($user)
        ->put(route('tags.update', $tag), ['name' => 'laravel'])
        ->assertRedirect(route('tags.index'));

    expect($tag->fresh()->name)->toBe('laravel');
});

test('deleting a tag keeps its posts', function () {
    $user = User::factory()->create();
    $tag = Tag::factory()->create();
    $post = Post::factory()->for($user)->create();
    $tag->posts()->attach($post);

    $this->actingAs($user)
        ->delete(route('tags.destroy', $tag))
        ->assertRedirect(route('tags.index'));

    expect(Tag::find($tag->id))->toBeNull()
        ->and(Post::find($post->id))->not->toBeNull()
        ->and($post->tags()->count())->toBe(0);
});

test('tag page shows its posts', function () {
    $user = User::factory()->create();
    $tag = Tag::factory()->create();
    $post = Post::factory()->for($user)->create(['title' => 'Sildiga postitus']);
    $other = Post::factory()->for($user)->create(['title' => 'Teine postitus']);
    $tag->posts()->attach($post);

    $this->actingAs($user)
        ->get(route('tags.show', $tag))
        ->assertOk()
        ->assertSee('Sildiga postitus')
        ->assertDontSee('Teine postitus');
});
