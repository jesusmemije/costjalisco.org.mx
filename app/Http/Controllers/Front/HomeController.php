<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('front.home');
    }

    public function know_more(){
        return view('front.know-more');
    }

    public function specific_project(){
        
        return view('front.specific_project');
    }
    public function account(){
        return view('front.account');
    }
}
