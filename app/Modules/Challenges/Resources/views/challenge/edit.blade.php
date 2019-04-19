@extends('layouts.app')
@section('title', 'Create challenge')

@section('content')
    <section class="content">
        <div class="clearfix"></div>
        @include('flash::message')
        {!! Form::open(['url'=> route('challenge.update', ['challenge' => $dto->getChallengeId()]), 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        @include('challenge.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
