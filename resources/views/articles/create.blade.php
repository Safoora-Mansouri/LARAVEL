@extends('layouts.app')
@section('title', trans('lang.text_titleCreatPage'))
@section('titleHeader', trans('lang.text_titleCreatPage'))
@section('content')

<form action="{{ route('article.store') }}" method="POST" class="needs-validation" novalidate>
    <!-- // prevent attack -->
    @csrf

    <div class="form-group">
        <label for="titre_fr">Titre :</label>
        <input type="text" class="form-control @error('titre_fr') is-invalid @enderror" id="titre_fr" name="titre_fr" required>
        @error('titre_fr')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="titre_en">Title :</label>
        <input type="text" class="form-control @error('titre_en') is-invalid @enderror" id="titre_en" name="titre_en" required>
        @error('titre_en')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="contenu_fr">Contenu :</label>
        <input type="text" class="form-control @error('contenu_fr') is-invalid @enderror" id="contenu_fr" name="contenu_fr" required>
        @error('contenu_fr')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="contenu_en">Content :</label>
        <input type="text" class="form-control @error('contenu_en') is-invalid @enderror" id="contenu_en" name="contenu_en" required>
        @error('contenu_en')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="date_de_creation">{{ __('lang.text_date') }} :</label>
        <input type="date" class="form-control @error('date_de_creation') is-invalid @enderror" id="date_de_creation" name="date_de_creation" required>
        @error('date_de_creation')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary" value="save">{{ __('lang.text_save') }}</button>
</form>
@endsection