@extends('layouts.app')
@section('title', __('lang.text_titlShowPage'))
@section('titleHeader', __('lang.text_titlShowPage'))

@section('content')

<div class="content-wrapper">

    @php $lang = session('locale') @endphp
    @php $titleAttribute = 'titre_'.$lang @endphp
    @php $contentAtribute = 'contenu_'.$lang @endphp

    <div class="custom-card ">
        @if (Auth::check() && $article->etudient_id == $etudiantId)
        <a href="{{ route('article.edit', $article->id) }}" class="btn btn-primary m-2">{{ __('lang.text_update') }}</a>
        <form action="{{ route('article.destroy', $article->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">{{ __('lang.text_deletButton') }}</button>
        </form>
        @else
        <a class="btn btn-primary m-2 disabled">{{ __('lang.text_update') }}</a>
        <a class="btn btn-danger m-2 disabled">{{ __('lang.text_deletButton') }}</a>
        @endif



        <div class="article-info bg-success">
            <h3 class="text-white text-center">{{ __('lang.text_articleInfo') }}</h3>
            <ul class="list-group">
                <li class="list-group-item">
                    <span class="font-weight-bold">ID de l'article :</span> {{ $article->id }}<br>
                    <span class="font-weight-bold">{{ __('lang.text_titre') }} :</span> {{ $article->$titleAttribute }}<br>
                    <span class="font-weight-bold">{{ __('lang.text_contenu') }} :</span> {{ $article->$contentAtribute }}<br>
                    <span class="font-weight-bold">{{ __('lang.text_date') }} :</span> {{ $article->date_de_creation }}<br>
                    <span class="font-weight-bold">{{ __('lang.text_langue') }} :</span> {{ $lang }}<br>
                    <span class="font-weight-bold">{{ __('lang.text_etudientId') }} :</span> {{ $article->etudient_id }}<br>
                    <span class="font-weight-bold">{{ __('lang.text_createdAt') }} :</span> {{ $article->created_at }}<br>
                    <span class="font-weight-bold">{{ __('lang.text_updatedAt') }} :</span> {{ $article->updated_at }}
                </li>
            </ul>
        </div>

        <a href="{{ route('article.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> {{ __('lang.text_backToList') }}
        </a>
    </div>
</div>
@endsection