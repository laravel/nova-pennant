<?php

namespace Laravel\Nova\PennantTool\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Laravel\Nova\Metrics\MetricTableRow;
use Laravel\Nova\Nova;
use Laravel\Pennant\Feature;

class FeaturesController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request): Collection
    {
        return Collection::make(Feature::for(Nova::user($request))->all())
            ->map(function ($value, $feature) {
                return MetricTableRow::make()
                    ->title(Str::headline($feature));

                // return [$feature => [
                //     'name' => Str::headline($feature),
                //     'value' => $value,
                // ]];
            })->values();
    }
}
