<?php

namespace App\Http\Controllers\Auth;
use App\User;
use Socialite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleGoogleProviderCallback()
    {
        try{
            $user = Socialite::driver('google')->user();
        }catch (Exception $e) {
            return redirect('login/google');
        }

        $authUser = $this->CreateUser($user);
        Auth::login($authUser, true);
        return redirect()->route('home');
    }

    public function CreateUser($user)
    {
        $authUser = User::where('email', $user->email)->first();
        if ($authUser) {
            return $authUser;

        }
        return User::create([
            'name'     => $user->name,
            'email'    => $user->email,
        ]);
    }

    public function showLoginForm(){
        return view('auth.login')->withTitle('Login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}