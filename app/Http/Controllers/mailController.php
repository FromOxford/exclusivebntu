<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class mailController extends Controller
{
    public  function send()
    {
        Mail::send(['text' => 'mail'],['name','exclusive'],function($message){
            $message->to('exclusive.cars.minsk@gmail.com','to exclusive')->subject('test message');
            $message->from('exclusive.cars.minsk@gmail.com','exclusive');
        });
    }
}
