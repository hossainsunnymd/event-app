<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //get all user
    public function listUser(){
        $data=User::all();
        return response()->json($data);
    }

    //get single user
    public function userById(Request $request){
        $id=$request->query('id');
        $data=User::where('id', $id)->first();
        return response()->json($data);
    }

    // create single user
    public function createUser(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
        ]);

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

    // update single user
    public function updateUser(Request $request){

        $id=$request->query('id');

        $request->validate([
            'name' => 'required',
            'password' => 'required|string|min:8'
        ]);

        User::where('id', $id)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
        ]);

        return response()->json([
            'status'=>true,
            'message' => 'User updated successfully',
        ], 201);
    }

    // delete single user
    public function deleteUser(Request $request){

        $id=$request->query('id');

        User::where('id', $id)->delete();

        return response()->json([
            'status'=>true,
            'message' => 'User deleted successfully'
        ]);
    }
}
