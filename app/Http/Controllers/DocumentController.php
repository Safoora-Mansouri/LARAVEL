<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Etudient;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\Auth;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $documents = Document::all();
        return view('documents.index', compact('documents'));
    }

    //////////////////////////////////////////////////////////
    public function pages()
    {
        $docs = Document::select()
            ->orderBy('titre')
            // ->limit(5)
            ->paginate(5); // be jaye limit va get

        return view('documents.pages', ['docs' => $docs]);
    }
///////////////////////////////////////////////////////////////////
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('documents.create');
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
        $user = Auth::user();
        $etudiantId = "";
        if ($user) {
            $etudiant = Etudient::where('user_id', $user->id)->first();
            if ($etudiant) {
                $etudiantId = $etudiant->id;
                $request->validate([
                    'titre_fr' => 'required|min:2|max:50',
                    'titre_en' => 'required|min:2|max:50',
                    'date' => 'required|date_format:Y-m-d',
                ]);
                $document = new Document;
                $document->titre_fr = ucfirst($request->titre_fr);
                $document->titre_en = ucfirst($request->titre_en);
                $document->date = $request->date;
                $document->etudient_id = $etudiantId;
                $document->save();
                return redirect()->route('document.index')->with('success', 'Document created successfully');
            }
        }

        // if (isset($image) && $image['error'] === UPLOAD_ERR_OK) {
        //     print_r($image);
        //     // Move the file to a permanent location
        //     $uploadDirectory = 'img/timbre/';
        //     $path = $uploadDirectory . basename($image['name']);

        //     if (!file_exists($uploadDirectory)) {
        //         mkdir($uploadDirectory, 0755, true);
        //     }

        //     $fileType = pathinfo($path, PATHINFO_EXTENSION);
        //     // Validate file type
        //     $allowedFileTypes = array('jpg', 'jpeg', 'png', 'gif');
        //     if (!in_array(strtolower($fileType), $allowedFileTypes)) {
        //         die('Error: Only JPG, JPEG, PNG, and GIF files are allowed.');
        //     }
        //     move_uploaded_file($image['tmp_name'], $path);
        // }

        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');

        //     // Validate the file if needed
        //     $this->validate($request, [
        //         'file' => 'required|mimes:pdf,zip,doc|max:2048',
        //     ]);

        //     // Move the uploaded file to a directory
        //     $path = $file->store('uploads');

        //     // You can save the file path to the database if required
        //     // $fileModel = new File;
        //     // $fileModel->path = $path;
        //     // $fileModel->save();

        //     return "File uploaded successfully!";
        // }

        // return "No file selected.";
   

        return redirect()->route('login')->with('error', 'Forbidden access');
    }
///////////////////////////////////////////////////////////////////////////
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $document = Document::findOrFail($id);
        return view('documents.show', compact('document'));
    }

    public function showPdf(Document $document)
    {
        $pdf = PDF::loadview('document.show-pdf', ['document' => $document]);

        // return $pdf->download('blog.pdf');
        return $pdf->stream('document.pdf');
    }
//////////////////////////////////////////////////////////////////////
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $document = Document::findOrFail($id);
        return view('documents.edit', compact('document'));
    }
//////////////////////////////////////////////////////////////////
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
                    'date' => 'required|date_format:Y-m-d',
                ]);
                $document = Document::findOrFail($id);
                $document->titre_fr = ucfirst($request->titre_fr);
                $document->titre_en = ucfirst($request->titre_en);
                $document->date = $request->date;
                $document->etudient_id = $etudiantId;
                $document->save();
                return redirect()->route('document.show', $document)->with('success', 'Document updated successfully');
            }
        }

        return redirect()->route('login')->with('error', 'Forbidden access');
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
