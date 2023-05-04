<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public function html_email(Request $request)
    {
        $this->email = $request->email;

        $data = array('name' => "Virat Gandhi");
        Mail::send('villa', $data, function ($message) {
            $message->to($this->email, 'JALANTA')->subject('Booking Information');
            $message->from('xyz@gmail.com', 'JALANTA');
        });
        echo "HTML Email Sent. Check your inbox.";
    }
}
