<?php

namespace App\Http\Controllers;

use App\Mail\MailBienvenida;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('nff@mail.com')->send(new MailBienvenida($mailData));

        dd("Email is sent successfully.");
    }
}
