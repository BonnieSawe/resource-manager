<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class File extends Model
{
    use HasFactory;

    public $fillable = [
        'path',
        'title',
    ];

    public $appends = [
        'url',
    ];

    public function getUrlAttribute () 
    {
        return asset($this->path);
    }
}
