<?php

namespace App\Http\Controllers\Auth;

use Validator;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Admins;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Str;

use DateTime;
use PhpParser\Node\Expr\Isset_;

class AdminAuthController extends Controller
{
    use AuthenticatesUsers;

    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
    }

    public function getLogin()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('dashboard');
        }
        return view('admin.auth.login');
    }


    public function verifyLogin(Request $request){



        $this->checkTooManyFailedAttempts();

        $this->validate($request, [
            'email' => 'bail|required|email',
            'password' => 'bail|required|'

        ]);

        $credentials = [
            'email' => $request['email'],
            'password' => $request['password'],
        ];

        if(isset($request->remember)&& $request->remember=='on'){
            $remember='true';
        }else{
            $remember=false;
        }


        if(Auth::guard('admin')->attempt($credentials,$remember)){

            RateLimiter::clear($this->throttleKey());

            $user = auth()->guard('admin')->user();

            $user->updated_at = new DateTime();

            $user->save();

            return redirect()->route('dashboard');

        }else{
            RateLimiter::hit($this->throttleKey(), $seconds = 3600);
            return back()->with('error', 'Dados de Acesso incorretos.');
        }
    }


    public function logout()
    {
        $auth = Auth::guard('admin');
        if ($auth instanceof \Illuminate\Contracts\Auth\StatefulGuard)
        {
            $auth->logout();


            return redirect()->route('adminLogin')->with('success','Sessão Terminada');
        }


    }

    public function throttleKey()
    {
        return Str::lower(request('email')) . '|' . request()->ip();
    }

    public function checkTooManyFailedAttempts()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 3)) {
            return;
        }

        return back()->with('error_attempts', 'Endereço IP banido. Muitas tentativas de login.');

    }

}
