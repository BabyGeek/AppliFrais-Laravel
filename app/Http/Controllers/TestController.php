<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaraFlash;

class TestController extends Controller
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
        LaraFlash::warning("Problème avec votre validation de suppression");
        LaraFlash::keep();

        return redirect()->route('dashboard');
    }
}
