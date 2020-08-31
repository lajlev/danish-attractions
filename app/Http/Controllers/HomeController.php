<?php

namespace App\Http\Controllers;
use App\Attraction;
use App\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if (Auth::check()) 
        {
            $attractionsVisited = auth()->user()->attractions;
            $attractionsNotVisited = Attraction::whereNotIn('id', $attractionsVisited->pluck('id'))->get();

            return view('home', [
                'attractionsNotVisited' => $attractionsNotVisited,
                'attractionsVisited' => $attractionsVisited,
                'attractions' => Attraction::all()
            ]);
        } 
        else
        {
            return view('home', [
                'attractionsRandom' => Attraction::all()->random(3),
                'users' => User::all()
            ]);
        }
        

        
    }
}
