<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectSectorSeeder extends Seeder
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

        $rows[] = ["id" => "1", "codigo" => "education", "titulo" => "Educación", "descripcion" => "Educación, incluyendo escuelas, universidades y otras instalaciones de aprendizaje y entrenamiento."];
        $rows[] = ["id" => "2", "codigo" => "health", "titulo" => "Salud", "descripcion" => "Salud, incluyendo hospitales, servicios humanos y de la salud"];
        $rows[] = ["id" => "3", "codigo" => "energy", "titulo" => "Energía", "descripcion" => "Energía, incluyendo generación de energía eléctrica, y la transmisión y distribución de la electricidad, combustible y gas, por ejemplo: plantas de energía, líneas eléctricas y gasoductos."];
        $rows[] = ["id" => "4", "codigo" => "communications", "titulo" => "Comunicaciones", "descripcion" => "Comunicaciones, incluyendo ICT, IT, telecomunicaciones, instalaciones postales, internet de alta velocidad, ancho de banda"];
        $rows[] = ["id" => "5", "codigo" => "waterAndWaste", "titulo" => "Agua y residuos", "descripcion" => "Agua y residuos, incluyendo saneamiento y aguas residuales"];
        $rows[] = ["id" => "6", "codigo" => "governance", "titulo" => "Gobernanza", "descripcion" => "Gobernanza, incluyendo instalaciones del gobierno, edificios públicos, oficinas gubernamentales; justicia, cortes; servicios de emergencia y respuesta a emergencias, seguridad local; seguridad, prisiones, correccionales; defensa, fuerzas armadas"];
        $rows[] = ["id" => "7", "codigo" => "economy", "titulo" => "Economía", "descripcion" => "Economía, incluyendo agronegocios, agricultura, ciencia y ambiente"];
        $rows[] = ["id" => "8", "codigo" => "cultureSportsAndRecreation", "titulo" => "Cultura, deportes y recreación", "descripcion" => "Cultura, deportes y recreación, incluyendo turismo, parques y áreas verdes"];
        $rows[] = ["id" => "9", "codigo" => "transport", "titulo" => "Transporte", "descripcion" => ""];
        $rows[] = ["id" => "10", "codigo" => "transport.air", "titulo" => "Transporte aéreo", "descripcion" => "Transporte aéreo, incluyendo aeropuertos, vías aéreas y aviación"];
        $rows[] = ["id" => "11", "codigo" => "transport.water", "titulo" => "Transporte fluvial", "descripcion" => "Transporte fluvial, incluyendo puertos y navegación interior"];
        $rows[] = ["id" => "12", "codigo" => "transport.rail", "titulo" => "Transporte ferroviario", "descripcion" => "Transporte ferroviario"];
        $rows[] = ["id" => "13", "codigo" => "transport.road", "titulo" => "Transporte terrestre", "descripcion" => "Transporte terrestre, incluyendo rutas, carreteras, calles, túneles y puentes"];
        $rows[] = ["id" => "14", "codigo" => "transport.urban", "titulo" => "Transporte urbano", "descripcion" => "Transporte urbano, incluyendo tránsito masivo, mobilidad urbana, buses, ciclismo, vías peatonales y taxis"];
        $rows[] = ["id" => "15", "codigo" => "socialHousing", "titulo" => "Viviendas sociales", "descripcion" => "Viviendas sociales"];

        // Disable FKs & truncate table
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        DB::table('ProjectSector')->truncate();

        // Date now
        $date = Carbon::now();

        // Create rows
        foreach($rows as $row)
        {
            DB::table('ProjectSector')->insert([
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
