@extends('layouts.app')
@section('title', 'Proofs')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">
                <a href="{{ route('check', $challenge->id) }}" class="btn btn-primary pull-right create-article">Check proofs</a>
            </div>
        </div>
        @include('proof.table')
    </div>
@endsection
