<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function basic_email() {
        $data = array('name'=>"Cipher Lock");

        Mail::send(['text'=>'mail'], $data, function($message) {
            $message->to('nothingpaticular@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
            $message->from('parkerh93@gmail.com','Peewee Herman');
        });
        echo "Basic Email Sent. Check your inbox.";
    }
    //
}
