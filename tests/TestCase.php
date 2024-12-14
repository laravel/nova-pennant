<?php

namespace Tests;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Orchestra\Testbench\Concerns\WithWorkbench;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{
    use LazilyRefreshDatabase;
    use WithWorkbench;

    /**
     * Automatically enables package discoveries.
     *
     * @var bool
     */
    protected $enablesPackageDiscoveries = true;

    /** {@inheritDoc} */
    protected function shouldSeed()
    {
        return true;
    }
}
