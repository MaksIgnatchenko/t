@extends('layouts.app')
@section('title', 'Proofs')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
{{--                    <a href="{{route('challenge.create')}}" class="btn btn-primary pull-right create-article">New challenge</a>--}}
                @include('proof.table')
            </div>
        </div>
    </div>
@endsection
