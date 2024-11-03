<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Jobs\SendWelcomeEmailJob;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthApiController extends Controller
{
    public function register(UserRequest $r){
        $r['password'] == Hash::make($r->password);
        $user = User::create($r->all());
        $token = $user->createToken('api')->plainTextToken;
        $answer = [
            'user' => $user,
            'token' => $token
        ];

        SendWelcomeEmailJob::dispatch($user);

        return response()->json($answer);
    }
    public function login(Request $request){
        abort_if(!$request->email, '401', 'email empty');
        abort_if(!$request->password, '401', 'password empty');
        $user = User::where('email', $request->email)->first();
        $hache_ckek = Hash::check($request->password, $user->password);
        if(!$user || !$hache_ckek){
            return reponsoe()->json([
                'message' => 'bad credits'
            ]);
        }
        $token = $user->createToken('api')->plainTextToken;
        $answer = [
            'user' => $user,
            'token' => $token
        ];
        return response()->json($answer);
    }
    public function logout(){

        if(Auth::user()){
            Auth::user()->tokens()->delete();
            Auth::logout();
        }

        return response()->json([
            'message' => 'logout'
        ]);
    }
    public function profile(){
        return response()->json(Auth::user());
    }
}
