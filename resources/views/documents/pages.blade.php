@extends('layouts.app')
@section('title',trans('lang.text_titlePageDoc'))
@section('titleHeader',trans('lang.text_titlePageDoc'))
@section('content')

<div class="card mt-3">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <!-- <th>Author</th> -->
                </tr>
            </thead>
            <tbody>
                @foreach($docs as $doc)
                <tr>
                    <td>{{ $doc->id }}</td>
                    <td>{{ $doc->titre }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
      

    </div>
    {{  $docs }}
</div>

@endsection