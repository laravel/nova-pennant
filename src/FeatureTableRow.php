<?php

namespace Laravel\Nova\PennantTool;

use JsonSerializable;
use Laravel\Nova\Makeable;
use Laravel\Nova\WithIcon;
use Stringable;

/**
 * @method static static make(bool|string $value)
 */
class FeatureTableRow implements JsonSerializable
{
    use Makeable;

    /**
     * Construct a new table row.=
     */
    public function __construct(
        public Stringable|string $title,
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
            'title' => $this->title,
            'value' => $this->value,
        ];
    }
}
