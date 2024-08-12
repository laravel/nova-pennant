<?php

use Laravel\Nova\PennantTool\FeatureTableRow;
use Workbench\App\Features\UserRole;

it('can be resolved', function () {
    $row = new FeatureTableRow('new-api', true);

    expect($row->meta())->toBe([
        'type' => 'closure',
        'options' => true,
    ]);

    expect($row->jsonSerialize())->toBe([
        'key' => 'new-api',
        'title' => 'New Api',
        'value' => true,
        'meta' => [
            'type' => 'closure',
            'options' => true,
        ],
    ]);
});


it('can resolve class based feature', function () {
    $row = new FeatureTableRow(UserRole::class, 'moderator');

    expect($row->meta())->toBe([
        'type' => 'class',
        'options' => false,
    ]);

    expect($row->jsonSerialize())->toBe([
        'key' => UserRole::class,
        'title' => 'User Role',
        'value' => 'moderator',
        'meta' => [
            'type' => 'class',
            'options' => false,
        ],
    ]);
});

it('can resolve class based feature with options', function () {
    $row = new FeatureTableRow('purchase-button', 'tart-orange');

    expect($row->meta())->toBe([
        'type' => 'class',
        'options' => [
            'blue-sapphire',
            'seafoam-green',
            'tart-orange',
        ],
    ]);

    expect($row->jsonSerialize())->toBe([
        'key' => 'purchase-button',
        'title' => 'Purchase Button',
        'value' => 'tart-orange',
        'meta' => [
            'type' => 'class',
            'options' => [
                'blue-sapphire',
                'seafoam-green',
                'tart-orange',
            ],
        ],
    ]);
});
