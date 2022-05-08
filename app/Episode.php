<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    public $timestamps = false;
    protected $fillable = ['season', 'number', 'watched'];
    
    public function anime()
    {
        return $this->belongsTo(Anime::class);
    }
}