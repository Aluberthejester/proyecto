<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Album extends Model
{
    use HasFactory;

    protected $fillable = ['artist_id', 'name', 'cover'];

    public function getUrlCover(){
        return Storage::url($this->cover);
    }

    public function deleteCover(){
        if($this->cover != "public/covers/no-image.png")
            Storage::delete($this->cover);
    }

    public function artist(){
        return $this->belongsTo(Artist::class);
    }

    public function songs(){
        return $this->hasMany(Songs::class);
    }
}
