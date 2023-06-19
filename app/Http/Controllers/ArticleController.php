<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Etudient;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if ($user) {
            // $articles = Article::all();
            $articles = Article::selectArticle();
            $etudiant = Etudient::where('user_id', $user->id)->first();

            if ($etudiant) {
                $etudiantId = $etudiant->id;
                return view('articles.index', compact('articles', 'etudiantId'));
            }
        }

        $message = "You must be logged in as a student user to view articles.";
        return view('articles.index', compact('message'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $etudiant = Etudient::where('user_id', $user->id)->first();

        $request->validate([
             'titre_fr' => 'required|min:2|max:50',
             'titre_en' => 'required|min:2|max:50',
             'contenu_fr' => 'required',
             'contenu_en' => 'required',
             'date_de_creation' => 'required|date_format:Y-m-d',
             
        ]);

        $article = new Article;
        $article->titre = $request->titre_en;
        $article->titre_fr = ucfirst($request->titre_fr);
        $article->titre_en = ucfirst($request->titre_en);
        $article->contenu = $request->contenu_en;
        $article->contenu_fr = $request->contenu_fr;
        $article->contenu_en = $request->contenu_en;
        $article->date_de_creation = $request->date_de_creation;
        $article->etudient_id = $etudiant->id;
        $article->save();

        return redirect()->route('article.index')->with('success', 'Article created successfully');
    }

     

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $user = Auth::user();
         $etudiantId="";
        if ($user) {
            $etudiant = Etudient::where('user_id', $user->id)->first();
            if ($etudiant) {
                $etudiantId = $etudiant->id;
            }
        }
        
        return view('articles.show', compact('article', "etudiantId"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Article $article)
    // {
    //     dd($request->titre_fr);
    //     $article->titre_fr = ucfirst($request->titre_fr);
    //     $article->titre_en = ucfirst($request->titre_en);

    //     $article->contenu_fr = $request->contenu_fr;
    //     $article->contenu_en = $request->contenu_en;
    //     $article->date_de_creation = $request->date_de_creation;
    //     $article->etudient_id = $request->etudient_id;
    //     $article->save();

    //     return redirect()->route('article.show', $article)->with('success', 'Article updated successfully');
    // }

    // public function update(Request $request, Article $article)
    // {
    //     $article->update([
    //         'titre' => $request->titre,
    //         'contenu' => $request->contenu,
    //         'date_de_creation' => $request->date_de_creation,
    //         'langue' => $request->langue,
    //         'etudient_id' => $request->etudient_id,
    //     ]);

    //     return redirect()->route('article.show', $article)->with('success', 'Article updated successfully');
    // }
    public function update(Request $request, Article $article)
    {
        $user = Auth::user();
        $etudiantId = "";
        if ($user) {
            $etudiant = Etudient::where('user_id', $user->id)->first();
            if ($etudiant) {
                $etudiantId = $etudiant->id;
                $request->validate([
                    'titre_fr' => 'required|min:2|max:50',
                    'titre_en' => 'required|min:2|max:50',
                    'contenu_fr' => 'required',
                    'contenu_en' => 'required',
                    'date_de_creation' => 'required|date_format:Y-m-d',
                   
                ]);
                $article->update([
                    'titre_fr' => ucfirst($request->titre_fr),
                    'titre_en' => ucfirst($request->titre_en),
                    'contenu_fr' => $request->contenu_fr,
                    'contenu_en' => $request->contenu_en,
                    'date_de_creation' => $request->date_de_creation,
                    'etudient_id' => $etudiantId,
                ]);
                return redirect()->route('article.show', $article)->with('success', 'Article updated successfully');
            }
            
        }

        return
        redirect()->route('login')->with('error', 'forbidden access');
       
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('article.index')->with('success', 'Article deleted successfully');
    }
}
