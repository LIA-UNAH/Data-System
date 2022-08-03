<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

       if(Auth::user()->hasrole('Administrador')){

       }else if(Auth::user()->hasrole('Empleado')){

       }else {
            $use = User::findOrFail(Auth::user()->id);
            $use->assignRole('Cliente');

            Auth::login($use);
       }

        return view('home');
    }
}
