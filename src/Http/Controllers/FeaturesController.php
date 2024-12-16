<?php

namespace Laravel\Nova\PennantTool\Http\Controllers;

use Illuminate\Support\Collection;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\PennantTool\FeatureTableRow;
use Laravel\Pennant\Feature;

class FeaturesController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NovaRequest $request): Collection
    {
        return Collection::make(Feature::for($request->findModelOrFail())->all())
            ->map(fn ($value, $feature) => FeatureTableRow::make(
                feature: $feature,
                value: $value,
                scope: $request->findModelOrFail(),
            ))->values();
    }
}
