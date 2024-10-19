<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Fancades\Hash;
use Illuminate\Support\Fancades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function login(Request $request)
    {
        $credential = $request->validate(['email'=>'required|email','password'=>'required']);
        $user = User::with('role')->where('email',$credential['email'])->first();

        if ($user && Hash::check($credential['password'], $user->password)) {
            $user->tokens()->delete(); 
            $token = $user->createToken('api')->plainTextToken;
            return response()->json(['token'=> $token,'user'=> $user]);
        }
        throw ValidationException::withMessages([
            'email' => 'Las credenciales no existen en nuestros registros',
        ]); 
    }
    

   }
