@extends('layouts.app')

@section('title', trans('lang.text_studentShowPage'))
@section('titleHeader', trans('lang.text_studentShowPage'))

@section('content')
<div class="content-wrapper">
    <div class="custom-card">
        <ul class="list-group">
            <li class="list-group-item">
                <span class="font-weight-bold">@lang('lang.text_etudientId'):</span> {{ $etudient->id }}<br>
                <span class="font-weight-bold">@lang('lang.text_nom'):</span> {{ $etudient->nom }}<br>
                <span class="font-weight-bold">@lang('lang.text_adresse'):</span> {{ $etudient->adresse }}<br>
                <span class="font-weight-bold">@lang('lang.text_phone'):</span> {{ $etudient->phone }}<br>
                <span class="font-weight-bold">@lang('lang.text_email'):</span> {{ $etudient->email }}<br>
                <span class="font-weight-bold">@lang('lang.text_date_de_naissance'):</span> {{ $etudient->date_de_naissance }}<br>
                <span class="font-weight-bold">@lang('lang.text_ville'):</span> {{ $etudient->ville_id }}<br>
                <span class="font-weight-bold">@lang('lang.text_createdAt'):</span> {{ $etudient->created_at }}<br>
                <span class="font-weight-bold">@lang('lang.text_updatedAt'):</span> {{ $etudient->updated_at }}
            </li>
        </ul>
        <a href="{{ route('etudient.index') }}" class="btn btn-primary mt-3">
            <i class="fas fa-arrow-left"></i> @lang('lang.text_backToList')
        </a>
    </div>
</div>

@endsection