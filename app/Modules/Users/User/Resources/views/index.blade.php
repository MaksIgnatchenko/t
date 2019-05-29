@extends('layouts.app')
@section('title', 'Users')

@section('content')
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">

                    <a href="#" class='btn btn-primary pull-right create-article'
                       onclick="document.getElementById('reset-coins').click()">
                        {!! Form::open(['method'=>'PUT', 'url'=> route('reset-coins')]) !!}
                        <button hidden id="reset-coins" data-toggle="tooltip" data-placement="top" title="Reset coins for all users"
                                type="submit" class="dropdown-item"
                                onclick="return confirm('Are you sure you want reset tickets for all users?');">
                        </button>
                        {!! Form::close() !!}
                        Reset tickets and rating for all users
                    </a>
                @include('table')
            </div>
        </div>
    </div>
@endsection
