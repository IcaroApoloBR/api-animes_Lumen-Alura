<?php

namespace App\Http\Controllers;

use App\Anime;
use Illuminate\Http\Request;

class AnimesController extends Controller
{
    public function index()
    {
        return Anime::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json(Anime::create($request->all()), 201); //created
    }

    public function show(int $id)
    {
        $anime = Anime::find($id);
        if (is_null($anime)) {
            return response()->json('', 204); //no content
        }

        return response()->json($anime);
    }

    public function update(int $id, Request $request)
    {
        $anime = Anime::find($id);
        if (is_null($anime)) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404); //not found
        }

        $anime->fill($request->all());
        $anime->save();

        return $anime;
    }

    public function destroy($id)
    {
        $qtdResourceRemove = Anime::destroy($id);
        if ($qtdResourceRemove === 0) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }

        return response()->json(['', 204]);
    }
}
