<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Rows
        $rows = [];

        $rows[] = ["id" => "1", "codigo" => "construction", "titulo" => "Construcción", "descripcion" => "El foco principal de este proyecto es la construcción de un nuevo activo."];
        $rows[] = ["id" => "2", "codigo" => "rehabilitation", "titulo" => "Rehabilitación", "descripcion" => "El foco principal de este proyecto es la rehabilitación de un activo existente."];
        $rows[] = ["id" => "3", "codigo" => "replacement", "titulo" => "Reemplazo", "descripcion" => "El foco principal de este proyecto es el reemplazo de un activo existente."];
        $rows[] = ["id" => "4", "codigo" => "expansion", "titulo" => "Expansión", "descripcion" => "El enfoque primario de este proyecto es la expansión de un activo existente."];

        // Disable FKs & truncate table
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('ProjectType')->truncate();

        Log::info($rows);

        // Date now
        $date = Carbon::now();

        // Create rows
        foreach($rows as $row)
        {
            DB::table('ProjectType')->insert([
                'id'          => $row['id'],
                'codigo'      => $row['codigo'],
                'titulo'      => $row['titulo'],
                'descripcion' => $row['descripcion'],
                'created_at'  => $date,
                'updated_at'  => $date,
            ]);
        }

        // Enable FKs
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
