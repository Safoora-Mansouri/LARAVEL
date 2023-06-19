<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\VilleController;
use App\Http\Controllers\EtudientController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LocalizationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/ville',[VilleController::class,'index'])->name('ville.index');
Route::get('/ville-edit/{ville}', [VilleController::class, 'edit'])->name('ville.edit');
Route::delete('/ville-delete/{ville}', [VilleController::class, 'destroy'])->name('ville.destroy');
Route::get('/ville-create', [VilleController::class, 'create'])->name('ville.create');
Route::put('/ville-update/{ville}', [VilleController::class, 'update'])->name('ville.update');
Route::get('/ville-show/{ville}', [VilleController::class, 'show'])->name('ville.show');
Route::post('/ville-store', [VilleController::class, 'store'])->name('ville.store');


Route::get('/', [EtudientController::class, 'index'])->name('etudient.index');
Route::get('/etudient-edit/{etudient}', [EtudientController::class, 'edit'])->name('etudient.edit');
Route::delete('/etudient-delete/{etudient}', [EtudientController::class, 'destroy'])->name('etudient.destroy');
Route::get('/etudient-create', [EtudientController::class, 'create'])->name('etudient.create');
Route::put('/etudient-update/{etudient}', [EtudientController::class, 'update'])->name('etudient.update');
Route::get('/etudient-show/{etudient}', [EtudientController::class, 'show'])->name('etudient.show');
Route::post('/etudient-store', [EtudientController::class, 'store'])->name('etudient.store');
Route::get('/etudient/{etudient}', [EtudientController::class, 'showEtudient'])->name('showEtudiant');

Route::get('/article', [ArticleController::class, 'index'])->name('article.index');
Route::get('/article-edit/{article}', [ArticleController::class, 'edit'])->name('article.edit');
Route::delete('/article-delete/{article}', [ArticleController::class, 'destroy'])->name('article.destroy');
Route::get('/article-create', [ArticleController::class, 'create'])->name('article.create');
Route::put('/article-update/{article}', [ArticleController::class, 'update'])->name('article.update');
Route::get('/article-show/{article}', [ArticleController::class, 'show'])->name('article.show');
Route::post('/article-store', [ArticleController::class, 'store'])->name('article.store');
Route::get('/show-article/{article}', [ArticleController::class, 'show'])->name('showArticle');


Route::get('/document', [DocumentController::class, 'index'])->name('document.index');
Route::get('/document-edit/{document}', [DocumentController::class, 'edit'])->name('document.edit');
Route::delete('/document-delete/{document}', [DocumentController::class, 'destroy'])->name('document.destroy');
Route::get('/document-create', [DocumentController::class, 'create'])->name('document.create');
Route::put('/document-update/{document}', [DocumentController::class, 'update'])->name('document.update');
Route::get('/document-show/{document}', [DocumentController::class, 'show'])->name('document.show');
Route::post('/document-store', [DocumentController::class, 'store'])->name('document.store');
Route::get('/show-document/{document}', [DocumentController::class, 'show'])->name('showDocument');

Route::get('document-pdf/{document}', [DocumentController::class, 'showPdf'])->name('document.showPdf')->middleware('auth');
Route::get('query', [DocumentController::class, 'query']);
Route::get('document-page', [DocumentController::class, 'index']);


//auth
Route::get('registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('registration', [CustomAuthController::class, 'store']);
//age as esme login estefadeh konin laravel mishnaseh, vagarne khodetoon bayad tarif konin.
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('login', [CustomAuthController::class, 'authentication'])->name('login.authentication');

Route::get('logout', [CustomAuthController::class, 'logout'])->name('logout');

Route::get('user-list', [CustomAuthController::class, 'userList'])->name('user.list')->middleware('auth');
Route::get('lang/{locale}', [LocalizationController::class, 'index'])->name('lang');