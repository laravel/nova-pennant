<?php

namespace Tests;

use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Orchestra\Testbench\Attributes\WithMigration;
use Orchestra\Testbench\Concerns\WithWorkbench;
use Workbench\Database\Seeders\DatabaseSeeder;

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

    /** {@inheritDoc} */
    protected function seeder()
    {
        return DatabaseSeeder::class;
    }
}
