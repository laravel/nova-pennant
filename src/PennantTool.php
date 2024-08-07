<?php

namespace Laravel\Nova\PennantTool;

use Closure;
use Laravel\Nova\Http\Requests\NovaRequest;
use Laravel\Nova\ResourceTool;

class PennantTool extends ResourceTool
{
    /**
     * Create a new resource tool instance.
     *
     * @return void
     */
    public function __construct(?string $name = null)
    {
        $this->name = $name;

        parent::__construct();

        $this->readonly(false);
    }

    /**
     * Get the displayable name of the resource tool.
     */
    public function name(): string
    {
        return $this->name ?? 'Features';
    }

    /**
     * Get the component name for the resource tool.
     */
    public function toolComponent(): string
    {
        return 'nova-pennant-tool';
    }

    /**
     * Set the callback used to determine if the resource tool is readonly.
     *
     * @param  (\Closure(\Laravel\Nova\Http\Requests\NovaRequest):(bool))|bool  $callback
     * @return $this
     */
    public function readonly(Closure|bool $callback = true)
    {
        $this->withMeta(['readonly' => $callback]);

        return $this;
    }
}
