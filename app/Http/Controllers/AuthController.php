<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\User;

class AuthController extends Controller
{
    public function authFailed(){
        return response('unauthenticated access', 401);
    }

    public function register(Request $request){
        $validator = Validator::make(
            $request->all(),[
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|string|email|unique:users|max:255',
                'password' => 'required|string|max:255|min:5|confirmed'
            ]
        );

        if($validator->fails()){
            return response(['error' => $validator->errors()], 422);
        }

        $user = new User();
        $user->first_name = $request->firstName;
        $user->last_name = $request->lastName;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->remember_token = $request->rememberToken;
        $user->save();
        return $this->getResponse($user);
    }

    public function login(Request $request){
        $validator = Validator::make(
            $request->all(),[
                'email' => 'required|string|email|max:255',
                'password' => 'required|string|max:255'
            ]
        );

        //verify user connection attempt
        $credentials = \request(['email', 'password']);
        if(Auth::attempt($credentials)){
            $user = $request->user();
            return $this->getResponse($user);
        }
    }

    public  function logout(Request $request){
        $request->user()->token()->revoke();
        return response('Successfuly logged out', 200);
    }

    public function user(Request $request){
        return $request->user();
    }

    private function getResponse(User $user){
        $tokenResult = $user->createToken("Personal access Token");
        $token = $tokenResult->token;
        $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();

        //return a response
        return response([
            'accessToken' => $tokenResult->accessToken,
            'tokenType' => "Bearer",
            'expiresAt' => Carbon::parse($token->expires_at)->toDateTimeString()
        ], 200);
    }


}
