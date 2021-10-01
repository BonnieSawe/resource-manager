<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Link;
use App\Models\Snippet;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ResourceManagerController extends Controller
{

    public function snippets()
    {
        $snippets = Snippet::get();
        return response()->json(compact('snippets'));
    }

    public function createSnippet(Request $request)
    {
        $created = Snippet::create($request->all());
        return response()->json(['created' => $created]);
    }

    public function showSnippet($id)
    {
        $snippet = Snippet::find($id);

        return response()->json([
            'snippet' => $snippet
        ]);
    }

    public function updateSnippet(Request $request, $id)
    {
        $updated = Snippet::find($id)->update($request->all());
        return response()->json(['updated' => $updated]);
    }

    public function deleteSnippet($id)
    {
        $deleted = Snippet::find($id)->delete();
        return response()->json(['deleted' => $deleted]);
    }


    //files

    public function files()
    {
        $files = File::get();
        return response()->json(compact('files'));
    }

    public function createFile(Request $request)
    {
        $path = $request->file('file')
                    ->store('files', 'public');

        $request->request->add(['path' => $path]);

        $created = File::create($request->all());
        return response()->json(['created' => $created]);
    }

    public function showFile($id)
    {
        $file = File::find($id);

        return response()->json([
            'file' => $file
        ]);
    }

    public function updateFile(Request $request, $id)
    {
        $updated = File::find($id)->update($request->all());
        return response()->json(['updated' => $updated]);
    }

    public function deleteFile($id)
    {
        $deleted = File::find($id)->delete();
        return response()->json(['deleted' => $deleted]);
    }

    //links

    public function links()
    {
        $links = Link::get();
        return response()->json(compact('links'));
    }

    public function createLink(Request $request)
    {
        $created = Link::create($request->all());
        return response()->json(['created' => $created]);
    }

    public function showLink($id)
    {
        $link = Link::find($id);

        return response()->json([
            'link' => $link
        ]);
    }

    public function updateLink(Request $request, $id)
    {
        $updated = Link::find($id)->update($request->all());
        return response()->json(['updated' => $updated]);
    }

    public function deleteLink($id)
    {
        $deleted = Link::find($id)->delete();
        return response()->json(['deleted' => $deleted]);
    }
}
