<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request){

        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            $user = Auth::user();
            //$success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['token'] = $request->user()->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            $response = [
                'success' => true,
                'data' => $success,
                'message' => 'User login successfully'
            ];

            return response()->json($response,200);
            }else{
                $response = [
                    'success' => false,
                    'message' => 'Unauthorised'
                ];
                return response()->json($response,200);
            }
    }
}
