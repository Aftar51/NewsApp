<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\User;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        try{
            //validate
            $this->validate($request,[
                'email' => 'required|email',
                'password' => 'required'
            ]);
            // cek credentials (login)
            $credentials = request(['email', 'password']);
            if(!Auth::attempt([
                'email' => $credentials['email'],
                'password' => $credentials['password']
            ])){
                return ResponseFormatter::error([
                    'massage' => 'Unauthorized'
                ], 'Authentication Failed', 401);
            };

            //cek jika password tidak sesuai
            $user = User::where('email', $credentials['email'])->first();
            if(!Hash::check($request->password, $user->password, [])){
                throw new \Exception('Invalid Credentials');
            };

            // jika berhasil cek password maka loginkan
            $tokenResult = $user->createToken('authToken')->plainTextToken;
            return ResponseFormatter::success([
                'access_token' => $tokenResult,
                'token_type' => 'Bearer',
                'user' => $user
            ], 'Authenticated', 200);

        } catch(Exception $error) {
            return ResponseFormatter::error([
                'massage' => 'Something went wrong',
                'error' => $error
            ], 'Authenticated Failed', 500);
        }
        
    }

    public function register(Request $request) {
        try{
            //validate
            $this->validate($request,[
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
                'confirm_password' => 'required|string|min:6'
            ]);

            //cek kondisi password dan confirm password
            if($request->password != $request->confirm_password){
                return ResponseFormatter::error([
                    'message' => 'Password not match'
                ], 'Authentication Failed', 401);
            }
        } catch (\Exception $error) {
            return ResponseFormatter::error([
                'massage' => 'Something went wrong',
                'error' => $error
            ], 'Authenticated Failed', 500);
        }
    }
}
