<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anime extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function episodes()
    {
        return $this->hasMany(Episode::class);
    }
}