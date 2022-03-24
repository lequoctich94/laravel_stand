<?php

namespace App\Http\Controllers\Tool;

use App\Http\Controllers\Controller;
use App\Mail\ModelSendMail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Email extends Controller
{
    public function sendMail(Request $request)
    {
        $test = [
            'message' => 'this is test email'
        ];

        // Ship the order...

        Mail::to("tichloantichloan@gmail.com")->queue(new ModelSendMail($test));
        return redirect('home');
    }
}
