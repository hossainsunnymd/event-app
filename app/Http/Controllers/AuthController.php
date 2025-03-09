<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function userRegistration(Request $request){
            $validation=Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
            ]);

            if($validation->fails()){
                return response()->json([
                    'status'=>false,
                    'message' => $validation->errors()
                ], 401);
            }

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return response()->json([
                'status'=>true,
                'message' => 'User created successfully',
                'data' => $user
            ], 201);
    }


    public function userLogin(Request $request){

        $validation=Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if($validation->fails()){
            return response()->json([
                'status'=>false,
                'message' => $validation->errors()
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status'=>false,
                'message' => 'Unauthorized'
            ], 401);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'=>true,
            'message' => 'User logged in successfully',
            'data' => $user,
            'token' => $token
        ]);
    }
}
