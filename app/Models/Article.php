<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{
    use HasFactory; 
    protected $fillable = [
        'id',
        'titre',
        'titre_fr',
        'titre_en',
        'contenu',
        'contenu_fr',
        'contenu_en',
        'date_de_creation',
        'langue',
        'etudient_id',
    ];


    use HasFactory;
    public function etudient()
    {

        return $this->hasOne('App\Models\Etudient', 'id', 'etudient_id');
    }
    /////////////////////////////////////////////////////////////////

    static public function selectArticle()
    {
        $lang = session()->get('localeDB');

        $query = Article::Select(
            'id',
            'etudient_id',
            'date_de_creation',
         DB::raw("(CASE WHEN titre$lang IS NULL THEN titre ELSE titre$lang END) as titre")
         
        )
            ->OrderBy('titre')
            ->get();
        return $query;
    }
}