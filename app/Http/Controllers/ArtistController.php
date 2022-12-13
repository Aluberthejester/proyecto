<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class ArtistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artists = Artist::orderBy('id')->paginate(3);
        return view('artists.index', compact('artists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('artists.create');
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
            'name' => 'required|max:255',
            'image' => 'image|mimes:jpeg,jpg,png,gif,svg',
        ]);
        $image = 'public/images/no-image.png';
        if($request->hasFile('image'))
            $image = $request->image->store('public/images');
        $artist = Artist::create([
            'name' => $request->name,
            'image' => $image,
        ]);
        $artist->save();
        return redirect()->route('artists.index');
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
    public function edit(Artist $artist)
    {
        return view('artists.edit', compact('artist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'name' => 'required|max:255',
            'image' =>  'file|mimes:jpg,jpeg,png,gif|max:1024',
            ]);
            $image = 'public/images/no-image.png';
            if($request->hasFile('image'))
                $image = $request->image->store('public/images');
            $artist->fill([
            'name' => $request->name,
            'image' => $image,
            ]);
            $artist->save();
            return redirect()->route('artists.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artist $artist)
    {
        $artist->delete();
        return redirect()->route('artists.index');
    }
}
