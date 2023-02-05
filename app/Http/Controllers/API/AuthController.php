<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use phpseclib3\Crypt\Hash;

class AuthController extends Controller
{
   public function register(Request $request){
       $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $token = $user->createToken('token')->accessToken;

        return response()->json(['token' =>$token, 'users'=>$user]);
   }
}
