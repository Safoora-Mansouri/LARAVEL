@extends('layouts.app')
@section('title','listn des villes')
@section('titleHeader','listn des villes')
@section('content')
<a href="{{ route('ville.create') }}" class="btn btn-success m-2">Create</a>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($villes as $ville)
        <tr>
            <td>{{ $ville->id }}</td>
            <td>{{ $ville->nom }}</td>
            <td>{{ $ville->created_at }}</td>
            <td>{{ $ville->updated_at }}</td>
            <td>
                <a href="{{ route('ville.edit', $ville->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('ville.destroy', $ville->id) }}" method="post" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection