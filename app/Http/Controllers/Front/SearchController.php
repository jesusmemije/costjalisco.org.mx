<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search_engine()
    {
        return view('front.search-engine');
    }

    public function georeferencing(Request $request)
    {
        if (empty($request->nombre_proyecto)) {
            if (empty($request->municipio)) {
                $projects = DB::table('project')
                    ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                    ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                    ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                    ->join('address', 'locations.id_address', '=', 'address.id')
                    ->select('project.*', 'locations.id_geometry', 'locations.id_gazetter', 'locations.uri', 'locations.id_address','locations.lat', 'locations.lng') 
                    // ->where('address.locality','=',$request->municipio)
                    ->get();
            } else {
                if (empty($request->id_sector)) {
                    $projects = DB::table('project')
                        // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                        ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                        ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                        ->join('address', 'locations.id_address', '=', 'address.id')
                        ->select('project.*', 'locations.id_geometry', 'locations.id_gazetter', 'locations.uri', 'locations.id_address','locations.lat', 'locations.lng') 
                        ->where('address.locality', '=', $request->municipio)
                        ->get();
                } else {
                    if (empty($request->id_subsector)) {
                        $projects = DB::table('project')
                            // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                            ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                            ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                            ->join('address', 'locations.id_address', '=', 'address.id')
                            ->select('project.*', 'locations.id_geometry', 'locations.id_gazetter', 'locations.uri', 'locations.id_address','locations.lat', 'locations.lng') 
                            ->where('address.locality', '=', $request->municipio)
                            ->where('project.sector', '=', $request->id_sector)
                            ->get();
                    } else {
                        if (empty($request->codigo_postal)) {
                            $projects = DB::table('project')
                                // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                                ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                                ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                                ->join('address', 'locations.id_address', '=', 'address.id')
                                ->select('project.*', 'locations.id_geometry', 'locations.id_gazetter', 'locations.uri', 'locations.id_address','locations.lat', 'locations.lng') 
                                ->where('address.locality', '=', $request->municipio)
                                ->where('project.sector', '=', $request->id_sector)
                                ->where('project.subsector', '=', $request->id_subsector)
                                ->get();
                        } else {
                            $projects = DB::table('project')
                                // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                                ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                                ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                                ->join('address', 'locations.id_address', '=', 'address.id')
                                ->select('project.*', 'locations.id_geometry', 'locations.id_gazetter', 'locations.uri', 'locations.id_address','locations.lat', 'locations.lng') 
                                ->where('address.locality', '=', $request->municipio)
                                ->where('project.sector', '=', $request->id_sector)
                                ->where('project.subsector', '=', $request->id_subsector)
                                ->where('address.postalCode', '=', $request->codigo_postal)
                                ->get();
                        }
                    }
                }
            }
        } else {
            if (empty($request->municipio)) {
                $projects = DB::table('project')
                    // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                    ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                    ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                    ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                    ->join('address', 'locations.id_address', '=', 'address.id')
                    ->select('project.*', 'locations.id_geometry', 'locations.id_gazetter', 'locations.uri', 'locations.id_address','locations.lat', 'locations.lng') 
                    // ->where('address.locality','=',$request->municipio)
                    ->orWhere('project.title', 'like', '%' . $request->nombre_proyecto . '%')
                    ->get();
            } else {

                $projects = DB::table('project')
                    // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                    ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                    ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                    ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                    ->join('address', 'locations.id_address', '=', 'address.id')
                    ->select('project.*', 'locations.id_geometry', 'locations.id_gazetter', 'locations.uri', 'locations.id_address','locations.lat', 'locations.lng') 
                    ->where('address.locality', '=', $request->municipio)
                    ->orWhere('project.title', 'like', '%' . $request->nombre_proyecto . '%')
                    ->get();
                // if (empty($request->id_sector)) {
                //     $projects=DB::table('project')
                //     // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                //     ->join('projectsector','project.sector','=','projectsector.id')
                //     ->join('project_locations','project.id','=','project_locations.id_project')
                //     ->join('locations','project_locations.id_location','=','locations.id')
                //     ->join('address','locations.id_address','=','address.id')
                //     ->select('project.*','locations.*')
                //     ->where('address.locality','=',$request->municipio)
                //     ->where('project.title','=',$request->nombre_proyecto)
                //     ->get();
                // } else {
                //     if (empty($request->id_subsector)) {
                //         $projects=DB::table('project')
                //         // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                //         ->join('projectsector','project.sector','=','projectsector.id')
                //         ->join('project_locations','project.id','=','project_locations.id_project')
                //         ->join('locations','project_locations.id_location','=','locations.id')
                //         ->join('address','locations.id_address','=','address.id')
                //         ->select('project.*','locations.*')
                //         ->where('address.locality','=',$request->municipio)
                //         ->where('project.sector','=',$request->id_sector)
                //         ->get();
                //     } else {
                //         if (empty($request->codigo_postal)) {
                //             $projects=DB::table('project')
                //             // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                //             ->join('projectsector','project.sector','=','projectsector.id')
                //             ->join('project_locations','project.id','=','project_locations.id_project')
                //             ->join('locations','project_locations.id_location','=','locations.id')
                //             ->join('address','locations.id_address','=','address.id')
                //             ->select('project.*','locations.*')
                //             ->where('address.locality','=',$request->municipio)
                //             ->where('project.sector','=',$request->id_sector)
                //             ->where('project.subsector','=',$request->id_subsector)
                //             ->get();
                //         } else {
                //             $projects=DB::table('project')
                //             // ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                //             ->join('projectsector','project.sector','=','projectsector.id')
                //             ->join('project_locations','project.id','=','project_locations.id_project')
                //             ->join('locations','project_locations.id_location','=','locations.id')
                //             ->join('address','locations.id_address','=','address.id')
                //             ->select('project.*','locations.*')
                //             ->where('address.locality','=',$request->municipio)
                //             ->where('project.sector','=',$request->id_sector)
                //             ->where('project.subsector','=',$request->id_subsector)
                //             ->where('address.postalCode','=',$request->codigo_postal)
                //             ->get();
                //         }


                //     }



                // }

            }
        }
        // $projects = DB::table('project')->get();

        return view('front.georeferencing', [
            'projects' => $projects
        ]);
    }

    public function sectores(Request $request)
    {
        if ($request->ajax()) {
            $sectores = DB::table('project')
                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                ->join('address', 'locations.id_address', '=', 'address.id')
                ->select('projectsector.*')
                ->where('address.locality', '=', $request->municipio_id)
                ->get();
            if (count($sectores) == 0) {
                $sectoresArray[0] = 'No se encontraron sectores';
            } else {
                foreach ($sectores as $sector) {
                    $sectoresArray[$sector->id] = $sector->titulo;
                }
            }

            return response()->json($sectoresArray);
        }
    }

    public function subsectores(Request $request)
    {
        if ($request->ajax()) {
            $sub_sectores = DB::table('subsector')
                ->join('sectorsubsector', 'subsector.id', '=', 'sectorsubsector.id_subsector')
                ->join('projectsector', 'sectorsubsector.id_sector', '=', 'projectsector.id')
                // ->join('locations','project_locations.id_location','=','locations.id')
                // ->join('address','locations.id_address','=','address.id')
                ->select('subsector.*')
                ->where('projectsector.id', '=', $request->sector_id)
                ->get();

            if (count($sub_sectores) == 0) {
                $subsectoresArray[0] = 'No se encontraron subsectores';
            } else {
                foreach ($sub_sectores as $sub_sector) {
                    $subsectoresArray[$sub_sector->id] = $sub_sector->titulo;
                }
            }
            return response()->json($subsectoresArray);
        }
    }

    public function codigo_postales(Request $request)
    {
        if ($request->ajax()) {
            $codigo_postales = DB::table('project')
                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                ->join('address', 'locations.id_address', '=', 'address.id')
                ->select('address.*')
                ->where('project.subsector', '=', $request->sub_sector_id)
                ->get();

            if (count($codigo_postales) == 0) {
                $codigo_postalesArray[0] = 'No hay codigo postal';
            } else {
                foreach ($codigo_postales as $codigo_postal) {
                    $codigo_postalesArray[$codigo_postal->postalCode] = $codigo_postal->postalCode;
                }
            }
            return response()->json($codigo_postalesArray);
        }
    }

}
