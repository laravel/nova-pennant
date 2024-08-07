<?php

namespace Laravel\Nova\PennantTool\Http\Controllers;

use Illuminate\Http\Response;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Pennant\Feature;

class ActivateFeatureController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NovaRequest $request): Response
    {
        Feature::for($request->findModelOrFail())->activate($request->input('key'), $request->input('value'));

        return response()->noContent();
    }
}
