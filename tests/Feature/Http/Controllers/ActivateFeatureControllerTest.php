<?php

use App\Models\User;
use Laravel\Nova\Testing\Concerns\InteractsWithNova;
use Laravel\Pennant\Feature;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;
use function Pest\Laravel\withoutExceptionHandling;
use function Pest\Laravel\withoutMix;

uses(InteractsWithNova::class);

beforeEach(function () {
    withoutMix();
    withoutExceptionHandling();
});

it('can activate a feature', function () {
    actingAs(User::first());

    $user = User::factory()->create();

    postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/activate", [
        'key' => 'new-api',
        'value' => true,
    ])->assertStatus(204);

    expect(Feature::for($user)->value('new-api'))->toBeTrue();
});

it('can activate a rich value feature', function () {
    actingAs(User::first());

    $user = User::factory()->create();

    postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/activate", [
        'key' => 'purchase-button',
        'value' => 'blue-sapphire',
    ])->assertStatus(204);

    expect(Feature::for($user)->value('purchase-button'))->toBe('blue-sapphire');
});

it('cannot active a feature when user is not authorized to run', function () {
    actingAs(User::factory()->create());

    $user = User::factory()->create();

    postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/activate", [
        'key' => 'new-api',
        'value' => true,
    ])->assertStatus(403);
});
