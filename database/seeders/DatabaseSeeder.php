<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Log::info('Ejecución de seeder');

        $this->call([
           // ProjectSectorSeeder::class,
            ProjectTypeSeeder::class,
            DocumentTypeSeeder::class,
        ]);

        Log::info('Tablas con datos - success');
    }
}
