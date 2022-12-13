<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Album::orderBy('id')->paginate(3);
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');

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
            'cover' => 'image|mimes:jpeg,jpg,png,gif,svg',
        ]);
        $cover = 'public/covers/no-image.png';
        if($request->hasFile('cover'))
            $cover = $request->cover->store('public/covers');
        $album = Album::create([
            'name' => $request->name,
            'cover' => $cover,
        ]);
        $album->save();
        return redirect()->route('albums.index');
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
    public function edit(Album $album)
    {
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Album $album)
    {
        $request->validate([
            'name' => 'required|max:255',
            'cover' => 'image|mimes:jpeg,jpg,png,gif,svg',
            ]);
            $cover = 'public/covers/no-image.png';
            if($request->hasFile('cover'))
                $cover = $request->cover->store('public/covers');
            $album->fill([
            'name' => $request->name,
            'cover' => $cover,
            ]);
            $album->save();
            return redirect()->route('albums.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('albums.index');
    }
}
