<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Coderello\Laraflash\Facades\Laraflash;

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
         laraflash()->content("Problème avec votre validation de suppression")->title('Problème de suppression')->type('warning');
        return redirect()->route('dashboard');
    }
}
