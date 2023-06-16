<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Etudient;
use App\Models\Ville;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

////////////////////////////////////////////////////////////

class etudientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { {
            // dd("ok");
            $etudients = Etudient::all();
            // dd($etudient);
            return view('etudients.index', ['etudients' => $etudients]);
         
        }
    }
    //////////////////////////////////////////////////////////////
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $villes = Ville::all();
        return view('etudients.create',['villes' => $villes]);
    }
    /////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userID = Auth::user()->id;
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'phone' => 'required|regex:/^\d{10}$/',
            'date_de_naissance' => 'required|date_format:Y-m-d',
            'ville_id' => 'required|exists:villes,id',
        ]);
        
        Etudient::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            // 'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id,
            'user_id' => $userID,
        ]);
        return redirect()->route('etudient.index');
    }

    /////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Etudient $etudient)
    {
        return view('etudients.show', ['etudient' => $etudient]);
    }
    ////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showEtudient(Etudient $etudient)

    {
       
        return view('etudients.showEtudient', ['etudient' => $etudient]);
    }
    //////////////////////////////////////////////////////////////
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Etudient $etudient)
    {
        $etudient->date_de_naissance = Carbon::parse($etudient->date_de_naissance)->format('Y-m-d');
        $villes = Ville::all();
        return view('etudients.edit', ['etudient' => $etudient , 'villes' => $villes]);
    }
    ////////////////////////////////////////////////////////////////
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudient $etudient)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'phone' => 'required|regex:/^\d{10}$/',
            'email' => 'required|email',
            'date_de_naissance' => 'required|date_format:Y-m-d',
            'ville_id' => 'required|exists:villes,id',
        ]);

        $etudient->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'ville_id' => $request->ville_id
        ]);

        return redirect()->route('showEtudiant', $etudient);
    }
    ////////////////////////////////////////////////////////////////////
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudient $etudient)
    {
        $etudient->delete();
        return redirect()->route('etudient.index');
    }
}
