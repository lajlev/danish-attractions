<?php

namespace App\Http\Controllers;
use App\Attraction;
use Illuminate\Http\Request;

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
        $attractionsVisited = auth()->user()->attractions;
        $attractionsNotVisited = Attraction::whereNotIn('id', $attractionsVisited->pluck('id'))->get();

        return view('home', [
            'attractionsNotVisited' => $attractionsNotVisited,
            'attractionsVisited' => $attractionsVisited    
        ]);
    }
}
