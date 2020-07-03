<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Http\Requests\ForgotRequest;
use Illuminate\Support\Str;
use App\User;
use Illuminate\Support\Facades\DB;
use Mail; 

class ForgotPassword extends Controller
{
    //
    public function forgot(ForgotRequest $request){
      
      return $this->getPasswordResetPasswordRow($request)->count()> 0 ? $this->changePassword($request) :
      $this->tokenNnotFound();
    }
    public function getPasswordResetPasswordRow($request){
        return  DB::table('password_resets')->where([
            'email'=> $request->email,
            'token' =>$request->resetToken
        ]);
    }

    public function tokenNnotFound(){
        return response([
               
            'error' => 'token or email is incorrect'
        ],404);
    }
    public function changePassword($request){
        $user =User::whereEmail($request->email)->first();
       $user->update(['password' =>bcrypt($request->password)]);
       $this->getPasswordResetPasswordRow($request)->delete();
       return response()->json([
               
        'message' => 'password change successfully '
    ]);
    }


   
       /* $email =$request->input('email');
       if(User::where('email' ,$email)->doesntExist()){
        return response([
               
            'message' => 'user doesnt exist'
        ], 404);
       }
       $token=Str::random(20);
      
        
       //send Email
       Mail::send('Mails.forgot',['token' => $token],function (Message $message) use ($email){
$message->to($email);
$message->subject('Reset your password');

       });
       return response([
               
        'message' => 'check your email'
    ], 404);
    }*/
    public function reset(Request $request){
        $token = $request ->input('token');
        if(!$passwordResets = DB::table('password_resets')->where(
            'token', $token
        )->first())
        return response([
               
            'message' => 'Invalid Token'
        ], 404);

    
    if(!$user =User::where('email',$passwordResets->email )->first()){
        return response([
               
            'message' => 'user doesnt exisit'
        ], 404);
    }
    $user->password= Hash::make($request->input('password'));
    $user->save();
    return response([
               
        'message' => 'succes'
    ]);
    }
}
