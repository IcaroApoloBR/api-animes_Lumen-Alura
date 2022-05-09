<?php

namespace App\Http\Controllers;

use App\Anime;

class AnimesController extends BaseController
{
    public function __construct()
    {
        $this->class = Anime::class;
    }
}
