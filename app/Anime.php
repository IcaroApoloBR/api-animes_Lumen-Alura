<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $appends = ['links'];
    // protected $perPage = 3; // default == 15

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }

    public function getLinksAttribute($link): array
    {
        return [
            'self' => '/api/animes/' . $this->id,
            'episodes' => '/api/animes/' . $this->id . '/episodes'
        ];
    }
}