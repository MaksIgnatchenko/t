@extends('layouts.app')
@section('title', 'Edit company: ' . $company->name)

@section('content')
    <section class="content">
        <div class="clearfix"></div>

        @include('flash::message')
        {!! Form::open(['url'=> route('company.update', ['company' => $company->id]), 'method' => 'PUT', 'files' => true]) !!}
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        @include('company.edit_fields')
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </section>
@endsection
