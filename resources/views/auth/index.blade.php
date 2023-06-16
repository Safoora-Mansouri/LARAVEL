@extends('layouts.app')
@section('title','login')
@section('titleHeader',trans('lang.text_login'))
@section('content')
<div class="row justify-content-center alert-admissible fade show">
    <!-- //payame afarin dorost bood !-->
    <div class="col-6">

        <div class="card">
            <!-- @lang('lang.taxt_login')
            {{trans('lang.text_login')}} -->
            <form action="{{ route('login.authentication')}}" method="post">
                @csrf
                <div class="card-body">

                    <input type="email" class="form-control mt-3" name="email" placeholder="@lang('lang.text_email')" value="{{ old('email') }}">
                    @if($errors->has('email'))
                    <div class=" text-danger mt-2">
                        {{ $errors->first('email')}}
                    </div>
                    @endif
                    <input type="password" class="form-control mt-3" name="password" placeholder="@lang('lang.text_password')">
                    @if($errors->has('password'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('password')}}
                    </div>
                    @endif
                </div>
                <div class="card-footer">
                    <input type="submit" value="@lang('lang.text_login')" class="btn btn-dark btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection