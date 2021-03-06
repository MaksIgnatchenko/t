@extends('layouts.app')
@section('title', 'Challenge details')
@section('content')

    <div class="content">

        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        @include('challenge.show_fields')
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

