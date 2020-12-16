<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function newsletters()
    {
        return view('front.newsletters');
    }

    public function newsletter_single()
    {
        return view('front.newsletter-single');
    }
}
