@extends('layouts.app')
@section('title', 'Terms & Conditions')

@section('content')

    <div class="clearfix"></div>

    @include('flash::message')

    @if ($errors->has('value'))
        <div class="text-red">{{ $errors->first('value') }}</div>
    @endif

    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                @foreach ($contents as $content)
                    <div class="col-md-6">
                        <form action="{{route('content.update', $content->key)}}" method="post">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <h3>
                                <label for="value">{{$content->title}}</label>
                            </h3>
                            <textarea name="value" class="form-control" cols="30" rows="20"
                                      style="resize:none">{{$content->value}}</textarea>
                            <br />
                            <div class="pull-right">
                                <button class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>

                @endforeach
            </div>
        </div>
    </div>
@endsection
