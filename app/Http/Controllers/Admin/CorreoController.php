<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Mail\MessageReceived;


class CorreoController extends Controller
{
    public function store(){
        $objDemo = new\stdClass();
        $objDemo->demo_one = 'Demo One Value';
        // $objDemo->demo_two = 'Demo Two Value';
        $objDemo->sender = 'SenderUserName';
        $objDemo->receiver = 'ReceiverUserName';
       
       
        // $sms=    request()->validate([

        //             'name'=>'required',
        //             'email'=> 'required|email',
        //             'subject'=> 'required',
        //             'content'=> 'required|min:3',
        //         ], [
        //             'name.required'=> __('I need your name')
                
        //         ]);
                
                Mail::to('pablodiazorgin@gmail.com')->queue(new MessageReceived($objDemo));
                // return new MessageReceived($sms); 
                return 'Mensaje enviado';
    }
}
