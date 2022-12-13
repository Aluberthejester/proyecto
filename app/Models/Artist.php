<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Artist extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image'];

    public function getUrlImage(){
        return Storage::url($this->image);
    }

    public function deleteImage(){
        if($this->image != "public/images/no-image.png")
            Storage::delete($this->image);
    }

    public function albums(){
        return $this->hasMany(Album::class);
    }

    public function songs(){
        return $this->hasMany(Songs::class);
    }
}
