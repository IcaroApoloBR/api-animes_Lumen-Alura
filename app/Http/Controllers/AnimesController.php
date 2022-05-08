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
            ->json(Anime::create(['name' => $request->name]), 201);
    }
}
