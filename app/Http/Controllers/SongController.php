<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\File;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $songs = Song::orderBy('id')->paginate(3);
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('songs.create');

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
            'title' => 'required|max:255',
            'length' => 'required|max:255',
            'track' => 'required|max:255',
            'disc' => 'required|max:255',
            'lyrics' => 'required|max:255',
            'path' => 'required|file|mimes:mp3,mp4,wav,mid',
            'mtime' => 'required|max:255',
        ]);
        $path = 'public/musics/music.mp3';
        if($request->hasFile('path'))
            $path = $request->path->store('public/musics');
        $songs = Song::create([
            'title' => $request->title,
            'length' => $request->length,
            'track' => $request->track,
            'disc' => $request->disc,
            'lyrics' => $request->lyrics,
            'path' => $path,
            'mtime' => $request->mtime,
        ]);
        $song->save();
        return redirect()->route('songs.index');
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
    public function edit(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Song $song)
    {
        $request->validate([
            'title' => 'required|max:255',
            'length' => 'required|max:255',
            'track' => 'required|max:255',
            'disc' => 'required|max:255',
            'lyrics' => 'required|max:255',
            'path' => 'required|file|mimes:mp3,mp4,wav,mid',
            'mtime' => 'required|max:255',
            ]);
            $path = 'public/musics/music.mp3';
            if($request->hasFile('path'))
                $path = $request->path->store('public/musics');
            $song->fill([
                'title' => $request->title,
                'length' => $request->length,
                'track' => $request->track,
                'disc' => $request->disc,
                'lyrics' => $request->lyrics,
                'path' => $path,
                'mtime' => $request->mtime,
            ]);
            $song->save();
            return redirect()->route('songs.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Song $song)
    {
        $song->delete();
        return redirect()->route('songs.index');
    }
}
