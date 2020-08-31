<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;

class VisitsController extends Controller
{
    public function create($attraction)
    {
        auth()->user()->attractions()->attach($attraction);
        return Redirect::to('/')->with('status', '🎊 Visit registered');
    }
    public function delete($attraction)
    {
        auth()->user()->attractions()->detach($attraction);
        return Redirect::to('/')->with('status', '❌ Visit removed');
    }
}



