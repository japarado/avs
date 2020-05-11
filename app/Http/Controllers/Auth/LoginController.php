<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

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
    /* protected $redirectTo = "/prompt"; */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'prompt']);
        $this->middleware('auth')->only('prompt');
    }

    public function prompt()
    {
        return view('auth/login')->with('showModal', true);
    }

    public function redirectTo()
    {
        $action = route('login');
        if (Auth::user()->role_id === config('constants.roles.admin')) {
            $action = action('SuperUserController@index');
        } elseif (Auth::user()->role_id === config('constants.roles.student')) {
            $action = action('VoteController@instructions');
        }

        return $action;
    }

    protected function sendFailedLoginResponse(Request $request)
    {
        $request->session()->flash('invalid-login', true);
        return redirect()->back();
    }
}
