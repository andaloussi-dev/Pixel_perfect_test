<?php

namespace App\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
class loginController extends Controller
{
    // 

    public function login(Request $request){
        // validating the input 
        $login=$request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        // in case the login failed
        if(!Auth::attempt($login)){
            return response(['message'=>'Invalid login creadentials']);
        }
        // using Token scopes to determine the auth user privileges
        
        if(Auth::user()->rool=='admin'){
            $token = Auth::user()->createToken('Token', ['admin-privilege'])->accessToken;
        }
        else{ $token = Auth::user()->createToken('Token', ['customer-privilege'])->accessToken;}

        //returnig the user with it access token
        return response(['user'=>Auth::user(),'access_token'=>$token]);

    }

}