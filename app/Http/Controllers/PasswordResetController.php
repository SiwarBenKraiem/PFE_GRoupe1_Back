<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\PasswordResetRequest;
use App\Notifications\PasswordResetSuccess;
use App\User;
use App\Mail\ResetPasswordMail;
use App\PasswordReset;
use Illuminate\Support\Str;
use Mail;
use DB;
class PasswordResetController extends Controller
{
    
    public function resett(Request $request){
        $user = User::where('email', $request->email)->first();
        if (!$user){
            return response()->json([
                'message' => 'We cant find a user with that e-mail address.'
            ], 404);
        }
            $this->send($request->email);
            return response()->json([
                'message' => 'succes check your email.'
            ], 404);

    }
    public function send($email){
        $token=$this->createToken($email);
        Mail::to($email)->send(new ResetPasswordMail($token));
    }
    public function createToken($email){
        $oldToken=DB::table('password_resets')->where('email',$email)->first();
        if($oldToken){
            return $oldToken;
        }
        $token=Str::random(60);
        $this->saveTtoken($token,$email);
        return $token;
    }
    public function saveTtoken($token,$email){
        DB::table('password_resets')->insert([
            'email'=> $email,
            'token' =>$token,
            'created_at' => Carbon::now()
        ]);
    }

    public function changer(Request $request){
        
    }
}