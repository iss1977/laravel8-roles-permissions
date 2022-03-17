<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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


    /**  trait AuthenticatesUsers has a trait RedirectsUsers with a "public function redirectPath()" that will execute this function */

    /**
    * Note:
    * If you want to redirect authenticated users on authentication routes by role to different paths,
    * just edit the "RedirectIfAuthenticated" middleware to redirect by different roles.
    */
    public function redirectTo()
{
    $for = [
        1 => 'admin.tasks.index',
        0  => 'user.tasks.index',
    ];
    return $this->redirectTo = route($for[auth()->user()->is_admin]);
}

}
