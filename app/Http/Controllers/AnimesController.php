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
}
