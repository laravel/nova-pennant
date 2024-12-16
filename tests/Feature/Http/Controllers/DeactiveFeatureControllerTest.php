<?php

use App\Models\User;
use Database\Factories\UserFactory;
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

it('can deactivate a feature', function () {
    actingAs(User::first());

    $user = UserFactory::new()->create();

    $response = postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/deactivate", [
        'key' => 'new-api',
    ])->assertStatus(204);

    expect(Feature::for($user)->value('new-api'))->toBeFalse();
});

it('can deactivate a rich value feature', function () {
    actingAs(User::first());

    $user = UserFactory::new()->create();

    $response = postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/deactivate", [
        'key' => 'purchase-button',
    ])->assertStatus(204);

    expect(Feature::for($user)->value('purchase-button'))->toBeFalse();
});

it('cannot deactive a feature when user is not authorized to run', function () {
    actingAs(User::factory()->create());

    $user = User::factory()->create();

    postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/deactivate", [
        'key' => 'new-api',
    ])->assertStatus(403);
});
