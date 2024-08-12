<?php

use Laravel\Nova\PennantTool\PennantTool;

it('can be resolved', function () {
    $tool = new PennantTool;

    expect($tool->name())
        ->not->toBeString()
        ->toEqual('Features');

    expect($tool->component)->toBe('panel');
    expect($tool->toolComponent())->toBe('nova-pennant-tool');
});

it('can be configure `canRun`', function () {
    $tool = (new PennantTool)->canRun(fn () => true);

    expect($tool->meta())->toBe([
        'authorizedToRun' => true,
    ]);
});

it('can be configure `requiresConfirmPassword`', function () {
    $tool = (new PennantTool)->requiresConfirmPassword(fn () => true);

    expect($tool->meta())->toBe([
        'requiresConfirmPassword' => true,
    ]);
});
