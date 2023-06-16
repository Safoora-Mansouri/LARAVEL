@extends('layouts.app')
@section('title','Ajouter un ville')
@section('titleHeader','Ajouter un ville')
@section('content')

<form action="{{ route('ville.store') }}" method="POST" class="needs-validation" novalidate>
    @csrf

    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" required>
        <div class="invalid-feedback">
            Please enter a name.
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection