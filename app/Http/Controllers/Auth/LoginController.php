<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use function PHPUnit\Framework\isNull;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated(Request $request, $user)
    {
        $username = Cookie::get('username');
        if($request->input('remember')){
            $minute1week = 60 * 24 * 7;
            $cookieUsername = cookie('username',$user->username,$minute1week);
            $cookiePassword = cookie('password',$user->password,$minute1week);
            Cookie::queue($cookieUsername);
            Cookie::queue($cookiePassword);
            $rememberTokenExpireMinutes = $minute1week;
            $rememberTokenName = Auth::getRecallerName();
            Cookie::queue($rememberTokenName, Cookie::get($rememberTokenName), $rememberTokenExpireMinutes);

        }
    }

    public function loggedOut(Request $request)
    {
        Cookie::queue(Cookie::forget('username'));
        Cookie::queue(Cookie::forget('password'));
        Cookie::queue(Cookie::forget(Auth::getRecallerName()));
    }

}
