<?php

namespace Laravel\Nova\PennantTool\Http\Controllers;

use Illuminate\Http\Response;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\PennantTool\PennantTool;
use Laravel\Nova\ResourceToolElement;
use Laravel\Pennant\Feature;

class ActivateFeatureController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(NovaRequest $request): Response
    {
        $tool = $request->findResourceOrFail()
            ->availableFieldsOnIndexOrDetail($request)
            ->whereInstanceOf(ResourceToolElement::class)
            ->filter(fn ($field) => $field->panel instanceof PennantTool)
            ->first();

        abort_if(is_null($tool), 404);
        abort_if(value($tool->meta()['authorizedToRun'] ?? true, $request), 403);

        Feature::for($request->findModelOrFail())->activate($request->input('key'), $request->input('value'));

        return response()->noContent();
    }
}
