<?php

namespace Laravel\Nova\PennantTool;

use Closure;
use Illuminate\Support\Lottery;
use JsonSerializable;
use Laravel\Nova\Makeable;
use Laravel\Nova\Nova;
use Laravel\Pennant\Feature;

/**
 * @method static static make(string $feature, bool|string $value)
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
        public bool|string $value,
        public mixed $scope,
    ) {
        //
    }

    /**
     * Get feature informations.
     *
     * @return array{type: string, options: array|bool}
     */
    public function meta(): array
    {
        $instance = Feature::instance($this->feature);

        $type = match (true) {
            $instance instanceof Lottery => 'lottery',
            $instance instanceof Closure => 'closure',
            default => 'class',
        };

        return [
            'type' => $type,
            'options' => match (true) {
                is_bool($this->value) => true,
                $type === 'class' && method_exists($instance, 'options') => $instance->options($this->scope),
                default => false,
            },
        ];
    }

    /**
     * Prepare the metric row for JSON serialization.
     *
     * @return array<string, mixed>
     */
    public function jsonSerialize(): array
    {
        return [
            'key' => $this->feature,
            'title' => Nova::humanize($this->feature),
            'value' => $this->value,
            'meta' => $this->meta(),
        ];
    }
}
