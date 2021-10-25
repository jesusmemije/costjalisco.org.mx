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
        // Hacemos la busqueda con el municipio
        if (empty($request->nombre_proyecto)) {
            if (empty($request->municipio)) {
                $projects = DB::table('project')
                ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                ->join('project_locations','project.id','=','project_locations.id_project')
                ->join('locations','project_locations.id_location','=','locations.id')
                ->join('address', 'locations.id_address', '=', 'address.id')
                ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                ->join('subsector', 'project.subsector', '=', 'subsector.id')
                ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                ->select('project.*','locations.principal as principal','organization.name as organizacion','projectsector.titulo as sector') 
                ->whereNotNull('proyecto_contratacion.montocontrato')
                ->orderBy('project.id', 'desc') 
                ->get();
                  
            } else {
                if (empty($request->id_sector)) {
                    // si no hay un sector seleccionado entonces solo hacemos la busqueda con el municipio
                        $projects = DB::table('project')
                        ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                        ->join('project_locations','project.id','=','project_locations.id_project')
                        ->join('locations','project_locations.id_location','=','locations.id')
                        ->join('address', 'locations.id_address', '=', 'address.id')
                        ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                        ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                        ->join('subsector', 'project.subsector', '=', 'subsector.id')
                        ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                        ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                        ->select('project.*','locations.principal as principal','organization.name as organizacion','projectsector.titulo as sector')
                        ->whereNotNull('proyecto_contratacion.montocontrato')
                        ->where('address.locality', '=', $request->municipio)
                        ->orderBy('project.created_at', 'desc')
                        ->get();
                      
                } else {
                    if (empty($request->id_subsector)) {
                        // si no hay un subsector seleccionado entonces hacemos la buesqueda con el sector y el municipio
                        $projects = DB::table('project')
                            ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                            ->join('project_locations','project.id','=','project_locations.id_project')
                            ->join('locations','project_locations.id_location','=','locations.id')
                            ->join('address', 'locations.id_address', '=', 'address.id')
                            ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                            ->join('subsector', 'project.subsector', '=', 'subsector.id')
                            ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                            ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                            ->select('project.*','locations.principal as principal','organization.name as organizacion','projectsector.titulo as sector') 
                            ->whereNotNull('proyecto_contratacion.montocontrato')
                            ->where('address.locality', '=', $request->municipio)
                            ->where('project.sector', '=', $request->id_sector)
                            ->orderBy('project.created_at', 'desc')
                            ->get();
                           
                    } else {
                        if (empty($request->codigo_postal)) {
                            // Hacemos la busqueda con el municipio, el sector y subsector porque no hay un codigo postal seleccionado
                            $projects = DB::table('project')
                                ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                                ->join('project_locations','project.id','=','project_locations.id_project')
                                ->join('locations','project_locations.id_location','=','locations.id')
                                ->join('address', 'locations.id_address', '=', 'address.id')
                                ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                                ->join('subsector', 'project.subsector', '=', 'subsector.id')
                                ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                                ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                                ->select('project.*','locations.principal as principal','organization.name as organizacion','projectsector.titulo as sector')  
                                ->whereNotNull('proyecto_contratacion.montocontrato')
                                ->where('address.locality', '=', $request->municipio)
                                ->where('project.sector', '=', $request->id_sector)
                                ->where('project.subsector', '=', $request->id_subsector)
                                ->orderBy('project.created_at', 'desc')
                                ->get();
                              
                        } else {
                            // Hacemos la busqueda con el municipio, sector, subsector y código postal
                            $projects = DB::table('project')
                                ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                                ->join('project_locations','project.id','=','project_locations.id_project')
                                ->join('locations','project_locations.id_location','=','locations.id')
                                ->join('address', 'locations.id_address', '=', 'address.id')
                                ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                                ->join('subsector', 'project.subsector', '=', 'subsector.id')
                                ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                                ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                                ->select('project.*','locations.principal as principal','organization.name as organizacion','projectsector.titulo as sector')
                                ->whereNotNull('proyecto_contratacion.montocontrato')
                                ->where('address.locality', '=', $request->municipio)
                                ->where('project.sector', '=', $request->id_sector)
                                ->where('project.subsector', '=', $request->id_subsector)
                                ->where('address.postalCode', '=', $request->codigo_postal)
                                ->orderBy('project.created_at', 'desc')
                                ->get();

                               
                        }
                    }
                }
            }
        } else {
            if (empty($request->municipio)) {
                // Hacemos la busqueda con el nombre del proyecto

                $projects = DB::table('project')
                    ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                    ->join('project_locations','project.id','=','project_locations.id_project')
                    ->join('locations','project_locations.id_location','=','locations.id')
                    ->join('address', 'locations.id_address', '=', 'address.id')
                    ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                    ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                    ->join('subsector', 'project.subsector', '=', 'subsector.id')
                    ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
                    ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
                    ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
                    ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                    ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                    ->select('project.*','locations.principal as principal','organization.name as organizacion','projectsector.titulo as sector') 
                    ->whereNotNull('proyecto_contratacion.montocontrato')
                    ->orWhere('project.title', 'like', '%' . $request->nombre_proyecto . '%')
                    ->orderBy('project.created_at', 'desc')
                    ->get();
            } else {
                // Hacemos la busqueda con el municipio, y el nombre del proyecto
                $projects = DB::table('project')
                    ->join('generaldata', 'project.id', '=', 'generaldata.id_project')
                    ->join('project_locations','project.id','=','project_locations.id_project')
                    ->join('locations','project_locations.id_location','=','locations.id')
                    ->join('address', 'locations.id_address', '=', 'address.id')
                    ->join('proyecto_contratacion','project.id','=','proyecto_contratacion.id_project')
                    ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                    ->join('subsector', 'project.subsector', '=', 'subsector.id')
                    ->leftJoin('estudiosambiental', 'project.id', '=', 'estudiosambiental.id_project')
                    ->leftJoin('estudiosfactibilidad', 'project.id', '=', 'estudiosfactibilidad.id_project')
                    ->leftJoin('estudiosimpacto', 'project.id', '=', 'estudiosimpacto.id_project')
                    ->join('project_organizations', 'project.id', '=', 'project_organizations.id_project')
                    ->join('organization', 'project_organizations.id_organization', '=', 'organization.id')
                    ->select('project.*','locations.principal as principal','organization.name as organizacion','projectsector.titulo as sector')  
                    ->whereNotNull('proyecto_contratacion.montocontrato')
                    ->where('address.locality', '=', $request->municipio)
                    ->orWhere('project.title', 'like', '%' . $request->nombre_proyecto . '%')
                    ->orderBy('project.created_at', 'desc')
                    ->get();
                
            }
        }

        return view('front.georeferencing', [
            'projects' => $projects
        ]);
    }

    public function sectores(Request $request)
    {
        // Hacemos la consulta de sectores pertenecientes al municipio seleccionado
        if ($request->ajax()) {
            $sectores = DB::table('project')
                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                ->join('address', 'locations.id_address', '=', 'address.id')
                ->select('projectsector.*')
                ->where('address.locality', '=', $request->municipio_id)
                ->orderBy('projectsector.titulo', 'asc')
                ->get();
            if (count($sectores) == 0) {
                $sectoresArray[0] = 'Sin resultados';
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
        // Hacemos la consulta de sub sectores pertenecientes al sector seleccionado
        if ($request->ajax()) {
            $sub_sectores = DB::table('subsector')
                ->join('sectorsubsector', 'subsector.id', '=', 'sectorsubsector.id_subsector')
                ->join('projectsector', 'sectorsubsector.id_sector', '=', 'projectsector.id')
                ->select('subsector.*')
                ->where('projectsector.id', '=', $request->sector_id)
                ->orderBy('subsector.titulo', 'asc')
                ->get();

            if (count($sub_sectores) == 0) {
                $subsectoresArray[0] = 'Sin resultados';
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
        // Hacemos la consulta de código postal pertenecientes al sub sector seleccionado
        if ($request->ajax()) {
            $codigo_postales = DB::table('project')
                ->join('projectsector', 'project.sector', '=', 'projectsector.id')
                ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
                ->join('locations', 'project_locations.id_location', '=', 'locations.id')
                ->join('address', 'locations.id_address', '=', 'address.id')
                ->select('address.*')
                ->where('project.subsector', '=', $request->sub_sector_id)
                ->orderBy('address.postalCode', 'asc')
                ->get();

            if (count($codigo_postales) == 0) {
                $codigo_postalesArray[0] = 'Sin resultados';
            } else {
                foreach ($codigo_postales as $codigo_postal) {
                    $codigo_postalesArray[$codigo_postal->postalCode] = $codigo_postal->postalCode;
                }
            }
            return response()->json($codigo_postalesArray);
        }
    }

}
