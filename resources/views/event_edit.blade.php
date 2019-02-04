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

                    {!! Form::model($event, [
                            'route' => ['events.update', $event->id],
                            'method' => 'PUT',
                            'name' => 'update-event',
                            ]) !!}

                    <div class="form-group">
                        {!! Form::label('name', 'Event Name:') !!}
                        {!! Form::text('name', $event->name, ['class' => 'form-control']) !!}
                        @if ($errors->has('name'))
                            <div class="alert alert-danger" role="alert"><strong>{{ $errors->first('name') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        {!! Form::label('started_at', 'Event Date:') !!}
                        {!! Form::datetimeLocal('started_at', Carbon::parse($event->started_at)->format('Y-m-d\TH:i:s'), ['class' => 'form-control']) !!}
                        @if ($errors->has('started_at'))
                            <div class="alert alert-danger" role="alert"><strong>{{ $errors->first('started_at') }}</strong>
                            </div>
                        @endif
                    </div>

                    <div class="form-group" hidden>
                        {!! Form::text('id', $event->id, ['class' => 'form-control']) !!}
                    </div>

                    {!! Form::submit('Update', ['class' => 'create-event-button submit btn btn-danger btn-block']) !!}

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
