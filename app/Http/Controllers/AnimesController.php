<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimesController extends Controller
{    
    public function index()
    {
        return [
            "Demon Slayer",
            "One Punch Man"
        ];
    }
}
