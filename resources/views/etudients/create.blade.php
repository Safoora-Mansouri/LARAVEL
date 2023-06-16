@extends('layouts.app')

@section('title', trans('lang.text_studentTitle'))
@section('titleHeader', trans('lang.text_studentTitle'))

@section('content')
<form action="{{ route('etudient.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf

    <div class="form-group">
        <label for="nom">@lang('lang.text_nom'):</label>
        <input type="text" class="form-control @error('nom') is-invalid @enderror" id="nom" name="nom" required>
        @error('nom')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="adresse">@lang('lang.text_adresse'):</label>
        <input type="text" class="form-control @error('adresse') is-invalid @enderror" id="adresse" name="adresse" required>
        @error('adresse')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="phone">@lang('lang.text_phone'):</label>
        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" required>
        @error('phone')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="date_de_naissance">@lang('lang.text_date_de_naissance'):</label>
        <input type="date" class="form-control @error('date_de_naissance') is-invalid @enderror" id="date_de_naissance" name="date_de_naissance" required>
        @error('date_de_naissance')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="ville_id">@lang('lang.text_ville'):</label>
        <select class="form-control @error('ville_id') is-invalid @enderror" id="ville_id" name="ville_id" required>
            @foreach($villes as $ville)
            <option value="{{ $ville->id }}">{{ $ville->nom }}</option>
            @endforeach
        </select>
        @error('ville_id')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">@lang('lang.text_save')</button>
</form>
@endsection