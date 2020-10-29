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
}
