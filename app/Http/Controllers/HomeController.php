<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fasesgrupo;
use App\Models\apuesta;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasesgrupos = Fasesgrupo::all();
        $apuestas = apuesta::all();
        return view('home', ['fasesgrupos'=> $fasesgrupos, 'apuestas'=> $apuestas]);
    }
}
