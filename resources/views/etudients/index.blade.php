@extends('layouts.app')

@section('title', trans('lang.text_studentIndexPage'))
@section('titleHeader', trans('lang.text_studentIndexPage'))

@section('content')
<div class="container">
    <h4 class="text-center p-3" style="background-color: #F7FAFC;">@lang('lang.text_studentList')</h4>

    <a href="{{ route('etudient.create') }}" class="btn btn-success m-2">@lang('lang.text_creatButton')</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>@lang('lang.text_nom')</th>
            </tr>
        </thead>
        <tbody>
            @foreach($etudients as $etudient)
            <tr>
                <td>{{ $etudient->id }}</td>
                <td>{{ $etudient->nom }}</td>
                <td>
                    <div class="butt">
                        <a href="{{ route('showEtudiant', $etudient->id) }}" class="btn btn-primary">@lang('lang.text_select')</a>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection