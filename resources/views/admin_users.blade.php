@extends('home')

@section('content')

    <section class="content-header">

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box">
            <div class="box-body">

                @include('table')

            </div>
        </div>
    </div>

@endsection
