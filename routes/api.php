<?php

use Illuminate\Support\Facades\Route;
use Laravel\Nova\PennantTool\Http\Controllers\ActivateFeatureController;
use Laravel\Nova\PennantTool\Http\Controllers\DeactivateFeatureController;
use Laravel\Nova\PennantTool\Http\Controllers\FeaturesController;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/{resource}/{resourceId}', FeaturesController::class);
Route::post('/{resource}/{resourceId}/activate', ActivateFeatureController::class);
Route::post('/{resource}/{resourceId}/deactivate', DeactivateFeatureController::class);
