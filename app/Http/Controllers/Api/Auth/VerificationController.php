<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Mail\RegisterUserMail;
use Illuminate\Support\Facades\Mail;


class VerificationController extends Controller
{
    use GeneralTrait;

    public function mailSend(){
           $details = [
               'tilte' => 'Title: Mail from laravel',
               'body: Body'
           ];

           Mail::to('App@wd.com')->send(new RegisterUserMail($details));
           return view('mail.register_user');

    }

}
