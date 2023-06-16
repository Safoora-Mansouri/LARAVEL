@extends('layouts.app')
@section('title','list des villes')
@section('titleHeader','list des villes')
@section('content')
<div class="result-container resultForm">
    <ul class="list-group">
        <li class="list-group-item">
            <span class="font-weight-bold">ID:</span> {{ $ville->id }}<br>
            <span class="font-weight-bold">Nom:</span> {{ $ville->nom }}<br>
            <span class="font-weight-bold">Created At:</span> {{ $ville->created_at }}<br>
            <span class="font-weight-bold">Updated At:</span> {{ $ville->updated_at }}
        </li>
    </ul>
    <a href="{{ route('ville.index') }}" class="btn btn-primary mt-3">
        <i class="fas fa-arrow-left"></i> Return
    </a>
</div>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
@endsection