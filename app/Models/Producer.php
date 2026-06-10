<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producer extends Model
{
    protected $fillable = ['name', 'country'];

    public function films()
    {
        return $this->hasMany(Film::class);
    }
}