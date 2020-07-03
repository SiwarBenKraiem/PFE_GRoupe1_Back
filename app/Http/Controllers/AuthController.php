<?php


namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\Http\Controllers\AccessTokenController;
use Carbon\Carbon ;




use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
          
            return response()->json([
              'success' => true,
              'token' => $success['token'],
              'user' => $user
              
          ]);
        } else {
       
          return response()->json([
            'success' => false,
            'message' => 'Invalid Email or Password',
        ], 401);
        }
    }


    public function Register(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:55',
            'email' => 'email|required',
            'password' => 'required|confirmed'
        ]);
        $validate['password'] = bcrypt($request->password);

        $user = User::create($validate);
        $accessToken = $user->createToken('AuthToken')->accessToken;
        return response(['user' => $user, 'access_token' => $accessToken]);

    }
  

    public function logout(Request $res)
    {
      if (Auth::user()) {
        $user = Auth::user()->token()->revoke();

        return response()->json([
          'success' => true,
          'message' => 'Logout successfully'
      ]);
      }else {
        return response()->json([
          'success' => false,
          'message' => 'Unable to Logout'
        ]);
      }
     
     }
     public function isconnected(Request $res)
    {
      if (Auth::user()) {
       

        return response()->json([
          'success' => true
          
      ]);
      }else {
        return response()->json([
          'success' => false
         
        ]);
      }
     
     }
    
    



}
