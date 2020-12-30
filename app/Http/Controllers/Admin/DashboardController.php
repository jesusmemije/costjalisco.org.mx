<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }

    

    public function formwizard()
    {

       
        return view('admin.formwizard');
    }

    public function admincarousel(){

        $h=DB::table('documents')
        ->where('description','=','carrusel')
        ->get();

        if(sizeof($h)==0){
           $edit=false;
        }else{
            $edit=true;
        }

        print_r($h);

        return view('admin.admincarousel',['edit'=>false]);
    }
}
