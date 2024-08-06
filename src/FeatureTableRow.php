<?php

namespace Laravel\Nova\PennantTool;

use JsonSerializable;
use Laravel\Nova\Makeable;
use Laravel\Nova\Nova;

/**
 * @method static static make(bool|string $value)
 */
class FeatureTableRow implements JsonSerializable
{
    use Makeable;

    /**
     * Construct a new table row.
     *
     * @param  class-string|string  $feature
     */
    public function __construct(
        public string $feature,
        public bool|string $value
    ) {
        //
    }

    /**
     * Prepare the metric row for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'feature' => $this->feature,
            'title' => Nova::humanize($this->feature),
            'value' => $this->value,
        ];
    }
}
