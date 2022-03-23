<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use Hash;
use Socialite;
use Str;
use App\Model\User;

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



    public function github(){

        // send the user request to github
        return Socialite::driver('github')->redirect();

    }

    public function githubRedirect(){

        // get oauth request back from github to authinticate user
        $user = Socialite::driver('github')->user();

        // check if user email exists if not then create user and log them in
        $user = User::firstOrCreat([
            'email' => $user->email
        ], [
            'name' => $user->name,
            'password' => Hash::make(Str::random(24))
        ]);

        Auth::login($user, true);

        // check if user is not suspended by admin
        if(Auth::user()->status == false){
            Auth::logout();
            return redirect()->route('suspended_account');
        }else{
            return redirect()->route('home');
        }

        
    }







    //Overriding the Login Method to logIn Active Users Only
    public function login(Request $request)
    {
        $this->validate($request, [
            'email'           => 'required|max:255|email',
            'password'           => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            
            //Check if user is not suspended by admin
            if(Auth::user()->status == false){
                Auth::logout();
                return redirect()->route('suspended_account');
            }else{
                return redirect()->intended();
            }
            
        }else {

            return redirect()->back();

        }

    }




}
