<?php

namespace App\Http\Controllers;

use App\Episode;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index()
    {
        return Episode::all();
    }

    public function store(Request $request)
    {
        return response()
            ->json(Episode::create($request->all()), 201); //created
    }

    public function show(int $id)
    {
        $Episode = Episode::find($id);
        if (is_null($Episode)) {
            return response()->json('', 204); //no content
        }

        return response()->json($Episode);
    }

    public function update(int $id, Request $request)
    {
        $Episode = Episode::find($id);
        if (is_null($Episode)) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404); //not found
        }

        $Episode->fill($request->all());
        $Episode->save();

        return $Episode;
    }

    public function destroy($id)
    {
        $qtdResourceRemoved = Episode::destroy($id);
        if ($qtdResourceRemoved === 0) {
            return response()->json([
                'error' => 'Resource not found'
            ], 404);
        }

        return response()->json(['', 204]);
    }
}
