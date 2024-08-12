<?php

use Laravel\Nova\Events\NovaServiceProviderRegistered;
use Laravel\Pennant\Feature;
use Workbench\App\Models\User;

use function Pest\Laravel\actingAs;
use function Pest\Laravel\postJson;

beforeEach(function () {
    actingAs(User::first());

    NovaServiceProviderRegistered::dispatch();
});

it('can deactivate a feature', function () {
    $user = User::factory()->create();

    $response = postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/deactivate", [
        'key' => 'new-api',
    ])->assertStatus(204);

    expect(Feature::for($user)->value('new-api'))->toBeFalse();
});

it('can deactivate a rich value feature', function () {
    $user = User::factory()->create();

    $response = postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/deactivate", [
        'key' => 'purchase-button',
    ])->assertStatus(204);

    expect(Feature::for($user)->value('purchase-button'))->toBeFalse();
});
