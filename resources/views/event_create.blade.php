@extends('home')

@section('content')

    <section class="content-header">

    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">

                    {!! Form::model(null, [
                            'route' => ['events.store'],
                            'method' => 'post',
                            'name' => 'create-event',
                            ]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Event Name:') !!}
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        @if ($errors->has('name'))
                            <div class="alert alert-danger" role="alert"><strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('started_at', 'Event Date:') !!}
                        {!! Form::datetimeLocal('started_at', \Carbon\Carbon::now(), ['class' => 'form-control']) !!}
                        @if ($errors->has('started_at'))
                            <div class="alert alert-danger" role="alert"><strong>{{ $errors->first('started_at') }}</strong>
                            </div>
                        @endif
                    </div>

                    {!! Form::submit('Create', ['class' => 'create-event-button submit btn btn-danger btn-block']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
