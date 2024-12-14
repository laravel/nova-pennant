<?php

namespace Database\Seeders;

use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserFactory::new()->create([
            'name' => 'Laravel Nova',
            'email' => 'nova@laravel.com',
        ]);

        UserFactory::new()->times(10)->create();
    }
}
