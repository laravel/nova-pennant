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

it('can activate a feature', function () {
    $user = User::factory()->create();

    $response = postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/activate", [
        'key' => 'new-api',
        'value' => true,
    ])->assertStatus(204);

    expect(Feature::for($user)->value('new-api'))->toBeTrue();
});

it('can activate a rich value feature', function () {
    $user = User::factory()->create();

    $response = postJson("/nova-vendor/nova-pennant/users/{$user->getKey()}/activate", [
        'key' => 'purchase-button',
        'value' => 'blue-sapphire',
    ])->assertStatus(204);

    expect(Feature::for($user)->value('purchase-button'))->toBe('blue-sapphire');
});
