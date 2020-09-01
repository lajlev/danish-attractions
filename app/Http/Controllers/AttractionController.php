<?php

namespace App\Http\Controllers;

use App\Attraction;
use Illuminate\Http\Request;

class AttractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attractions = Attraction::all();

        return view('attractions.index', compact('attractions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attractions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'url_gmap'=>'required'
        ]);

        $attraction = new Attraction([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'url_gmap' => $request->get('url_gmap'),
            'image' => $request->get('image')

        ]);
        
        $attraction->save();
        return redirect('/attractions')->with('success', 'Attraction saved ✅');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attraction = Attraction::find($id);
        return view('attractions.edit', compact('attraction')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'url_gmap'=>'required'
        ]);

        $attraction = Attraction::find($id);

        $attraction->name = $request->get('name');
        $attraction->description = $request->get('description');
        $attraction->url_gmap = $request->get('url_gmap');
        $attraction->image = $request->get('image');
        $attraction->save();

        return redirect('/attractions')->with('success', 'Attraction updated ✅');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attraction = Attraction::find($id);
        $attraction->delete();

        return redirect('/attractions')->with('success', 'Attraction deleted 🗑️');
    }
}
