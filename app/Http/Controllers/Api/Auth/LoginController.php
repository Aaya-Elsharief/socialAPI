<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\User;
use \Illuminate\Support\Facades\Validator;
use Auth;


class LoginController extends Controller
{
    use GeneralTrait;

    public function login(Request $request){


/*
        //validation
        $rules = [
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }



*/


        }







}
