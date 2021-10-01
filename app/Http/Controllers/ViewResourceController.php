<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Link;
use App\Models\Snippet;
use Illuminate\Http\Request;

class ViewResourceController extends Controller
{
    public function snippets()
    {
        $snippets = Snippet::get();
        return response()->json(compact('snippets'));
    }

    public function files()
    {
        $files = File::get();
        return response()->json(compact('files'));
    }

    public function links()
    {
        $links = Link::get();
        return response()->json(compact('links'));
    }
}
