@extends('layouts.app')
@section('title',trans('lang.text_registration'))
@section('titleHeader',trans('lang.text_registration'))
@section('content')
<div class="row justify-content-center">
    <!-- //payame afarin dorost bood !-->
    <div class="col-6">

        <div class="card">
            <!-- @lang('lang.taxt_login')
            {{trans('lang.text_login')}} -->
            <form method="post">
                @csrf
                <div class="card-body">
                    <!-- //////////////////////////////// -->

                    <input type="text" class="form-control mt-3" name="name" placeholder="@lang('lang.text_name')" value="{{ old('name') }}">
                    @if($errors->has('name'))
                    <div class="text-danger mt-2">
                        {{ $errors->first('name')}}
                    </div>
                    @endif
                    <!-- //////////////////////////////// -->

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
                    <input type="submit" value="@lang('lang.text_save')" class="btn btn-dark btn-block">
                </div>
            </form>
        </div>
    </div>
</div>
@endsection