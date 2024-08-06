<?php

namespace Laravel\Nova\PennantTool;

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
     *
     * @return string
     */
    public function toolComponent(): string
    {
        return 'nova-pennant-tool';
    }
}
