<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ville extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom'
    ];

    public function etudient()
    {
        return $this->hasMany('App\Models\Etudient','ville_id', 'id');
    }
}
