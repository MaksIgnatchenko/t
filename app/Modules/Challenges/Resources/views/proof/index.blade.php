@extends('layouts.app')
@section('title', 'Proofs')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        @include('proof.table')
    </div>
@endsection
