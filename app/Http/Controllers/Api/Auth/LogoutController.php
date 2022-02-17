<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use Illuminate\Http\Request;


class LogoutController extends Controller
{
    use GeneralTrait;


    public function logout(Request $request){
        $token = $request -> user()->token();
        if($token){
         $token->revoke();
         return $this->returnSuccess('Logged out successfully');
        }
        else{
            return $this -> returnError('','some thing went wrong');
        }

    }
}
