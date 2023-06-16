@extends('layouts.app')

@section('title', trans('lang.text_studentEditPage'))
@section('titleHeader', trans('lang.text_studentEditPage'))

@section('content')
<form action="{{ route('etudient.update', $etudient->id) }}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nom">@lang('lang.text_nom'):</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $etudient->nom }}" required>
        <div class="invalid-feedback">
            @lang('lang.text_requiredField')
        </div>
    </div>

    <div class="form-group">
        <label for="adresse">@lang('lang.text_adresse'):</label>
        <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $etudient->adresse }}" required>
        <div class="invalid-feedback">
            @lang('lang.text_requiredField')
        </div>
    </div>

    <div class="form-group">
        <label for="phone">@lang('lang.text_phone'):</label>
        <input type="text" class="form-control" id="phone" name="phone" value="{{ $etudient->phone }}" required>
        <div class="invalid-feedback">
            @lang('lang.text_requiredField')
        </div>
    </div>

    <div class="form-group">
        <label for="email">@lang('lang.text_email'):</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $etudient->email }}" required>
        <div class="invalid-feedback">
            @lang('lang.text_invalidEmail')
        </div>
    </div>

    <div class="form-group">
        <label for="date_de_naissance">@lang('lang.text_date_de_naissance'):</label>
        <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control" value="{{ $etudient->date_de_naissance }}">
        <div class="invalid-feedback">
            @lang('lang.text_invalidDate')
        </div>
    </div>

    <div class="form-group">
        <label for="ville_id">@lang('lang.text_ville'):</label>
        <select class="form-control" id="ville_id" name="ville_id" required>
            @foreach($villes as $ville)
            <option value="{{ $ville->id }}" {{ $etudient->ville_id == $ville->id ? 'selected' : ""}}>{{ $ville->nom }}</option>
            @endforeach
        </select>
        <div class="invalid-feedback">
            @lang('lang.text_requiredField')
        </div>
    </div>

    <button type="submit" class="btn btn-primary">@lang('lang.text_update')</button>
</form>
@endsection