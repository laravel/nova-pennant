<?php

namespace Workbench\App\Features;

use Illuminate\Support\Arr;

class PurchaseButton
{
    /**
     * The stored name of the feature.
     *
     * @var string
     */
    public $name = 'purchase-button';

    /**
     * Resolve the feature's initial value.
     */
    public function resolve(mixed $scope): mixed
    {
        return Arr::random($this->options());
    }

    /**
     * Features available options.
     *
     * @return array<int, string>
     */
    public function options(): array
    {
        return [
            'blue-sapphire',
            'seafoam-green',
            'tart-orange',
        ];
    }
}
