@extends('layouts.app')
@section('title', trans('lang.text_titleEditPage'))
@section('titleHeader', trans('lang.text_titleEditPage'))
@section('content')

<form action="{{ route('article.update', $article->id) }}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="titre">{{ trans('lang.text_titre') }} :</label>
        <input type="text" class="form-control" id="titre_en" name="titre_en" value="{{ $article->titre_en }}" required>
        <div class="invalid-feedback">
            {{ trans('lang.text_title') }}
        </div>
    </div>
    <div class="form-group">
        <label for="titre">{{ trans('lang.text_titre') }} :</label>
        <input type="text" class="form-control" id="titre_fr" name="titre_fr" value="{{ $article->titre_fr }}" required>
        <div class="invalid-feedback">
            {{ trans('lang.text_title') }}
        </div>
    </div>

    <div class="form-group">
        <label for="contenu">{{ trans('lang.text_contenu') }} :</label>
        <textarea class="form-control" id="contenu" name="contenu_en" required>{{ $article->contenu_en }}</textarea>
        <div class="invalid-feedback">
            {{ trans('lang.text_insertModification') }}
        </div>
    </div>
    <div class="form-group">
        <label for="contenu">{{ trans('lang.text_contenu') }} :</label>
        <textarea class="form-control" id="contenu" name="contenu_fr" required>{{ $article->contenu_fr }}</textarea>
        <div class="invalid-feedback">
            {{ trans('lang.text_insertModification') }}
        </div>
    </div>

    <div class="form-group">
        <label for="date_de_creation">{{ trans('lang.text_date') }} :</label>
        <input type="date" id="date_de_creation" name="date_de_creation" class="form-control" value="{{ $article->date_de_creation }}">
        <div class="invalid-feedback">
            {{ trans('lang.text_messageDateCreation') }}
        </div>
    </div>


    <button type="submit" class="btn btn-primary">{{ trans('lang.text_updatedAt') }}</button>
</form>
@endsection