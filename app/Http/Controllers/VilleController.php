<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ville;

////////////////////////////////////////////////////////////
class VilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $villes = Ville::all();
        return view('villes.index', compact('villes'));
    }
///////////////////////////////////////////////////
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('villes.create');
    }
//////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Ville::create([
            'nom'=>$request->nom
        ]);
        return redirect()->route('ville.index');
    }
//////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ville $ville)
    {
        return view('villes.show', ['ville' => $ville]);
    }
/////////////////////////////////////////////////////////
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ville = Ville::find($id);
        return view('villes.edit', ['ville' => $ville]);
    }
//////////////////////////////////////////////////////////
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ville $ville)
    {
       $ville->update([
         'nom' => $request->nom,
       ]);
       
      return redirect()->route('ville.show',$ville);
    }
///////////////////////////////////////////////////////////////
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ville $ville)
    {
        $ville->etudient()->delete();
        $ville->delete();

        return redirect()->back();
    }
//////////////////////////////////////////////////////////////
}
