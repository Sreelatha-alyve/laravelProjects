<?php

namespace App\Http\Controllers\Api\Auth;

//use App\Http\Controllers\Models\User;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistrationRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    //login method
    public function login(LoginRequest $request)
    {
        $token = auth()->attempt($request->validated());
        if($token)
        {
            return $this->responseWithToken($token,auth()->user());
        }
        else{
            return response()->json([
                    'status' => 'failed',
                    'message' => 'Invalid credentials',
            ],401);
        } 
    }

    //registration method
    public function register(RegistrationRequest $request)
    {
        // Hash the password before saving the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        if ($user) {
            //generating the token after creating an user successfully
            $token = auth()->login($user);
            return $this->responseWithToken($token, $user);
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'An error occurred while trying to create user'
            ], 500);
        }
    }

    public function responseWithToken($token, $user)
    {
        //sending the response 
        return response()->json([
            'status' => 'success',
            'user' => $user,
            'access_token' => $token,
            'type' => 'bearer'
        ]);
    }
}
 