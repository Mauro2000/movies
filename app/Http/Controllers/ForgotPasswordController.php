<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use App\Models\User;
use App\Models\password_resets;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm()
    {
       return view('frontend.access-app.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:users',
          ]);

          $verify=password_resets::where('email','=',$request->email)->count();

          if($verify >=1){
            return back()->with('error', 'Já existe um pedido pendente para o email solicitado!, Verifique a sua caixa de correio eletronico');
          }

          $token = Str::random(64);

          DB::table('password_resets')->insert([
              'email' => $request->email,
              'token' => $token,
              'created_at' => Carbon::now()
            ]);

          Mail::send('frontend.emails.forgetEmail', ['token' => $token,'email'=>$request->email], function($message) use($request){
              $message->to($request->email);
              $message->subject('Reset Password');
          });

          return back()->with('message', 'We have e-mailed your password reset link!');
      }

      public function showResetPasswordForm(Request $request) {

        $token=password_resets::where('token','=',$request->token)->first();




        if($token){

            $created_at= Carbon::parse($token->created_at);
            $now = Carbon::now();
            $dif=$created_at->diffInDays($now);

            if($dif > 24 ){
                $token->delete();

                return redirect()->route('pageLogin')->with('error','Token expirado!');
            }

            return view('frontend.access-app.forgetPasswordLink', ['token' => $request->token]);
        }else{
            return redirect()->route('pageLogin')->with('error','Token Invalido');
        }




     }

     public function submitResetPasswordForm(Request $request)
     {
         $request->validate([
             'email' => 'required|email|exists:users',
             'password' => 'required|string|min:6|required_with:password_confirm|same:password_confirm',
             'password_confirm' => 'required'
         ]);



         $updatePassword = password_resets::where("email",'=',$request->email)->where("token",'=',$request->token)->first();


         if(!$updatePassword){
             return back()->withInput()->with('error', 'Invalid token!');
         }

         $user = User::where('email', $request->email)
                     ->update(['password' => Hash::make($request->password)]);

         DB::table('password_resets')->where(['email'=> $request->email])->delete();

         return redirect()->route('pageLogin')->with('success', 'Palavra-Passe alterada com sucesso');
     }
}
