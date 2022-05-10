<?php

namespace App\Http\Controllers;

use App\Episode;

class EpisodesController extends BaseController
{
    public function __construct()
    {
        $this->class = Episode::class;
    }

    public function searchPerAnime(int $animeId)
    {
        $episodes = Episode::query()
        ->where('anime_id', $animeId)
        ->get();

        return $episodes;
    }
}
