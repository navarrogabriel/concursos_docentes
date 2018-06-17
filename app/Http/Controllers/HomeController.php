<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        /*$this->middleware('Administrador');
        $this->middleware('Administrativo');
        $this->middleware('Miembro');*/

    }

    /**
     * Show the application dashboard.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
