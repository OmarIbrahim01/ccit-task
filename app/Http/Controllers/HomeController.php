<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }


    public function index()
    {

        if(Auth::check()){

            if(Auth::user()->role_id == 1){

                return redirect()->route('admin_dashboard');

            }elseif(Auth::user()->role_id == 2){

                return redirect()->route('plans.index');

            }

        }else{

             return view('home');

        }

        
    }
}
