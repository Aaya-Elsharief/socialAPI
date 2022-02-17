<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\GeneralTrait;
use App\Mail\RegisterUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;




class RegisterController extends Controller
{
    use GeneralTrait;
    public function register(Request $request){

        //validation

        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ];

         $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
          //  $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError( $validator);
        }


        //register

        $user = User::create([
            'name' => $request->name,
            'email'=>$request->email,
            'password' => Hash::make($request->password)
        ]);
         $user -> save();

        if($user){
            Mail::to($request->email)->send(new RegisterUserMail($user));
            return $this->returnSuccess('User Added Successfully & email verfied');

        }

        return $this->returnSuccess('User Added Successfully');

    }
}
