@extends('layouts.app')
@section('title','edit un ville')
@section('titleHeader','edit un ville')
@section('content')
<form action="{{ route('ville.update', $ville->id) }}" method="POST" class="needs-validation" novalidate>
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="nom">Nom:</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $ville->nom }}" required>
        <div class="invalid-feedback">
            Please enter a name.
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection