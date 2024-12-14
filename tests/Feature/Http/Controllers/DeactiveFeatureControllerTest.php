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

    actingAs(User::first());
    withoutExceptionHandling();
});

it('can deactivate a feature', function () {
    $user = UserFactory::new()->create();

    $response = postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/deactivate", [
        'key' => 'new-api',
    ])->assertStatus(204);

    expect(Feature::for($user)->value('new-api'))->toBeFalse();
});

it('can deactivate a rich value feature', function () {
    $user = UserFactory::new()->create();

    $response = postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/deactivate", [
        'key' => 'purchase-button',
    ])->assertStatus(204);

    expect(Feature::for($user)->value('purchase-button'))->toBeFalse();
});
