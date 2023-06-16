<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudient extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'nom',
        'adresse',
        'phone',
        'email',
        'date_de_naissance',
        'ville_id',
        'user_id'

    ];

    use HasFactory;
    public function ville()
    {
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }

    use HasFactory;
    public function user(){
        
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
    public function article()
    {
        return $this->hasMany('App\Models\Article', 'etudient_id', 'id');
    }

    public function getEmailAttribute()
    {
        return $this->user->email;
    }

}
