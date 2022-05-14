<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $timestamps = false;
    protected $fillable = ['season', 'number', 'watched', 'anime_id'];
    protected $appends = ['links'];
    
    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }

    public function getWatchedAttribute($watched): bool
    {
        return $watched;
    }

    public function getLinksAttribute(): array
    {
        return [
            'self' => '/api/episodes/' . $this->id,
            'animes' => '/api/animes/' . $this->anime_id
        ];
    }
}