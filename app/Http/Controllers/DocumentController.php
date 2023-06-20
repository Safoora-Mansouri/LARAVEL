<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Etudient;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiant = Etudient::where('user_id', auth()->id())->first();
        $documents = Document::select()
        ->orderBy('titre')
        // ->limit(5)
        ->paginate(5);
          
        return view('documents.index', compact('documents','etudiant'));
    }

///////////////////////////////////////////////////////////////////
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $etudiant = Etudient::where('user_id', $user->id)->first();
            if ($etudiant) {
                $etudiantId = $etudiant->id;
                return view('documents.creat', compact('etudiantId'));
            }
            return redirect()->route('etudient.create')->with('error', 'You must be a student to create a document.');;
        } else {
            // User is not authenticated, handle the error or redirect to the login page
            return redirect()->route('login')->with('error', 'You must be logged in to create a document.');
        }
    }
////////////////////////////////////////////////////////////////
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Check if user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $etudiant = Etudient::where('user_id', $user->id)->first();
            $etudiantId = $etudiant->id;
    
            
            $request->validate([
                'titre_fr' => 'required',
                'titre_en' => 'required',
                'file' => 'required|mimes:pdf,zip,doc|max:2048',
                'date' => 'required|date',
            ]);
    
           
            // Store the file
            if ($request->hasFile('file')) {
                $file = $request->file('file');
    
               $fileName= time().'.'.$file->extension();
               // storage/app/public/files
                $filePath = $file->storeAs('public/files',$fileName);
    
                Document::create([
                    'titre' => $request->titre_en,
                    'titre_fr' => $request->titre_fr,
                    'titre_en' => $request->titre_en,
                    'file' => $fileName,
                    'date' => $request->date,
                    'etudient_id' => $etudiantId, // Use $etudiantId variable instead of $request->etudient_id
                ]);
    
                return back()->with('success', 'Document created successfully');
            }
        } else {
            // User is not authenticated, handle the error or redirect to the login page
            return  back()->with('error', 'You must be logged in to create a document.');
        }
    }

    ///////////////////////////////////////////
 /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Document  $Document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        
        return view('documents.edit', compact('document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Document  $document
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Document $document)
    {
        // Check if user is authenticated
        if (Auth::check()) {
            $user = Auth::user();
            $etudiant = Etudient::where('user_id', $user->id)->first();
            $etudiantId = $etudiant->id;
    
            
            $request->validate([
                'titre_fr' => 'required',
                'titre_en' => 'required',
                'file' => 'required|mimes:pdf,zip,doc|max:2048',
                'date' => 'required|date',
            ]);
    
            
            // Store the file
            if ($request->hasFile('file')) {
                $file = $request->file('file');
    
               $fileName= time().'.'.$file->extension();
               // storage/app/public/files
               $file->storeAs('public/files',$fileName);
    
               $document->update([
                    'titre' => $request->titre_en,
                    'titre_fr' => $request->titre_fr,
                    'titre_en' => $request->titre_en,
                    'file' => $fileName,
                    'date' => $request->date,
                    'etudient_id' => $etudiantId, // Use $etudiantId variable instead of $request->etudient_id
                ]);
    
                return back()->with('success', 'Document updated successfully');
            }
        } else {
            // User is not authenticated, handle the error or redirect to the login page
            return  back()->with('error', 'You must be logged in to update a document.');
        }

        return
        redirect()->route('login')->with('error', 'forbidden access');
       

        
    }
    
//////////////////////////////////////////////////////////////////////
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $document = Document::findOrFail($id);
        $document->delete();
        return redirect()->route('document.index')->with('success', 'Document deleted successfully');
    }
    //////////////////////////////////////////////////////////////////////////

}
