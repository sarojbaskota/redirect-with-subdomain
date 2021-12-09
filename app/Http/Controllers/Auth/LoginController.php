<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() {
        if(auth()->user()->user_type == 1){
            return '/home';
        }
        else{
            // $domain =  preg_replace('#^https?://#', '', rtrim(env('APP_URL', 'http://localhost'),'/'));
            // $subdomain = auth()->user()->subdomain.'.'.$domain.'/dashboard';

            // $redirectTo = property_exists($this, 'redirectTo') ? $this->redirectTo : '/dashboard';

            $this->redirectPath();
        } 
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function redirectPath()
    {
        $redirectTo = property_exists($this, 'redirectTo') ? $this->redirectTo : '/home';

        $url = env('APP_URL');
        $subDomain = auth()->user()->subdomain;
        $scheme = parse_url($url, PHP_URL_SCHEME);
        $host = parse_url($url, PHP_URL_HOST);
        return $scheme.'://'.$subDomain.'.'.$host.$redirectTo;
    }
}
