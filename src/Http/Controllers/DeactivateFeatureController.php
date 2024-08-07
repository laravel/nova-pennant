<?php

namespace Laravel\Nova\PennantTool\Http\Controllers;

use Illuminate\Http\Response;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Pennant\Feature;

class DeactivateFeatureController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NovaRequest $request): Response
    {
        Feature::for($request->findModelOrFail())->deactivate($request->input('key'));

        return response()->noContent();
    }
}
