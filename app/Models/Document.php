<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
     use HasFactory; 
    protected $fillable = [
        'id',
        'titre',
        'titre_fr',
        'titre_en',
        'file',
        'date',
        'etudient_id',
    ];


    use HasFactory;
    public function etudient()
    {

        return $this->hasOne('App\Models\Etudient', 'id', 'etudient_id');
    }
}