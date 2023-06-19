@extends('layouts.app')
@section('title',trans('lang.text_titlePageDoc'))
@section('titleHeader',trans('lang.text_titlePageDoc'))
@section('content')
<div class="container">
    @if (isset($message))
    <h3 class="text-danger p-5">{{$message}}</h3>

    @else
    <h4 class="text-center p-3" style="background-color: #F7FAFC;">{{__('lang.text_selectAnDoc')}}</h4>

    @auth
    <a href="{{ route('document.create') }}" class="btn btn-success m-2">{{__('lang.text_creatButton')}}</a>
    @endauth

    @guest
    <a class="btn btn-success m-2 disabled">{{__('lang.text_creatButton')}}</a>
    @endguest

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>{{__('lang.text_titre')}}</th>
                <th>{{ __('lang.text_date') }}</th>
                <th class="text-center">{{ __('lang.text_action') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($documents as $document)
            <tr>
                <td>{{ $document->id }}</td>
                <td> <a href="{{ asset('storage/files/'.$document->file) }}">{{ $document->titre }}</a></td>


                <td>{{ $document->date }}</td>
                <td>

                    @if (Auth::check() && $etudiant && $document->etudient_id == $etudiant->id)


                    <form action="{{ route('document.destroy', $document->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">{{ __('lang.text_deletButton') }}</button>
                    </form>

                    <a href="{{ route('document.edit', $document->id) }}" class="btn btn-warning  ms-2">{{ __('lang.text_update') }}</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$documents}}
    @endif
</div>
@endsection