<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {   
        $projects = DB::table('project')
            ->join('projectsector', 'project.sector', '=', 'projectsector.id')
            ->join('project_locations', 'project.id', '=', 'project_locations.id_project')
            ->join('locations', 'project_locations.id_location', '=', 'locations.id')
            ->join('address', 'locations.id_address', '=', 'address.id')
            ->select('project.*', 'locations.id_geometry', 'locations.id_gazetter', 'locations.uri', 'locations.id_address','locations.lat', 'locations.lng') 
            ->get();
        
        return view('front.home', [
            'projects' => $projects
        ]);
    }

    public function know_more()
    {
        return view('front.know-more');
    }

    public function about_us()
    {
        return view('front.about-us');
    }

    public function resources()
    {
        return view('front.resources');
    }

    public function statistics()
    {
        return view('front.statistics');
    }

    public function interest_sites()
    {
        return view('front.interest-sites');
    }

    public function account()
    {
        return view('auth.account');
    }

    public function contact_us()
    {
        return view('front.contact-us');
    }

    public function sitemap()
    {
        return view('front.sitemap');
    }
    
    public function support_material()
    {
        return view('front.support-material');
    }

    public function journal()
    {
        return view('front.journal');
    }

    public function organizations()
    {
        $publicos = DB::table('dir_org')
            ->where('sector', '=', 'Sector Público')
            ->get();
        $academicos = DB::table('dir_org')
            ->where('sector', '=', 'Sector Académico')
            ->get();
        $privados = DB::table('dir_org')
            ->where('sector', '=', 'Sector Privado')
            ->get();
        $organizados = DB::table('dir_org')
            ->where('sector', '=', 'Sociedad Civil Organizada')
            ->get();
        $estrategicos = DB::table('dir_org')
            ->where('sector', '=', 'Aliados Estratégicos')
            ->get();

        return view('front.organizations', [
            'publicos' => $publicos,
            'academicos' => $academicos,
            'privados' => $privados,
            'organizados' => $organizados,
            'estrategicos' => $estrategicos,
        ]);
    }

}
