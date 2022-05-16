<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Torneo extends Model
{
    use HasFactory;
    
    
    public function club()
    {
        return $this->belongsToMany(Club::class,'torneo_clubs','Torneo','Equipo');
    }

}
