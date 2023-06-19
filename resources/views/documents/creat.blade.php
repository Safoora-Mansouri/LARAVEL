@extends('layouts.app')
@section('title', trans('lang.text_titleCreatDoc'))
@section('titleHeader', trans('lang.text_titleCreatDoc'))
@section('content')

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<form  enctype="multipart/form-data" action="{{ route('document.store') }}" 
 method="POST" class="needs-validation" novalidate>
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
        <label for="date">Date :</label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required>
        @error('date')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    
    <div class="form-group">
        <label for="etudient_id">File Upload :</label>
        <input type="file" class="form-control @error('file') is-invalid @enderror" id="file"
         name="file" required>
        @error('file')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary" value="save">{{ __('lang.text_save') }}</button>
</form>
@endsection
