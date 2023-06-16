@extends('layouts.app')
@section('title',trans('lang.text_titlIndexPage'))
@section('titleHeader',trans('lang.text_titlIndexPage'))
@section('content')

<div class="container">
    @if (isset($message))
    <h3 class="text-danger p-5">{{$message}}</h3>

    @else
    <h4 class="text-center p-3" style="background-color: #F7FAFC;">{{__('lang.text_selectAnArticle')}}.</h4>

    @auth
    <a href="{{ route('article.create') }}" class="btn btn-success m-2">{{__('lang.text_creatButton')}}</a>
    @endauth

    @guest
    <a class="btn btn-success m-2 disabled">Cr{{__('lang.text_creatButton')}}</a>
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
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td><a href="{{ route('article.show', ['article' => $article->id]) }}" class="">{{ $article->titre }}</a></td>
                <td>{{ $article->date_de_creation }}</td>
                <td>

                    @if (Auth::check() && $article->etudient_id == $etudiantId)
                    <div class="butt">
                        <!-- <a href="{{ route('showArticle', $article->id) }}" class="btn btn-primary">Sélectionner</a> -->
                        <form action="{{ route('article.destroy', $article->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">{{ __('lang.text_deletButton') }}</button>
                        </form>
                        @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>
@endsection