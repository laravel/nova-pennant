<?php

namespace Laravel\Nova\PennantTool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laravel\Nova\Nova;
use Laravel\Nova\PennantTool\FeatureTableRow;
use Laravel\Pennant\Feature;

class FeaturesController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Collection
    {
        return Collection::make(Feature::for(Nova::user($request))->all())
            ->map(fn ($value, $feature) => FeatureTableRow::make(
                title: class_exists($feature) ? $feature : Str::headline($feature),
                value: $value,
            ))->values();
    }
}
