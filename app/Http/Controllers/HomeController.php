<?php

namespace App\Http\Controllers;
use App\Attraction;
use Illuminate\Http\Request;

class HomeController extends Controller
{

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
