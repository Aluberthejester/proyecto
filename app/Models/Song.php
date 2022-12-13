<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Song extends Model
{
    use HasFactory;

    protected $fillable = ['album_id', 'artist_id', 'title', 'length', 'track', 'disc', 'lyrics', 'path', 'mtime'];

    public function getUrlPath(){
        return Storage::url($this->path);
    }

    public function deletePath(){
        if($this->path != "public/musics/music.mp3")
            Storage::delete($this->path);
    }

    public function playlists(){
        //pertenece a muchos
        return $this->belongsToMany(Playlist::class);
    }

    public function interactions(){
        return $this->hasMany(Interaction::class);
    }

    public function album(){
        return $this->belongsTo(Album::class);
    }

    public function artist(){
        return $this->belongsTo(Artist::class);
    }
}
