@extends('layouts.auth')

@section('content')

    <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>

    <div class="p-3">
        <form method="post" action="{{ route('password.restore') }}" class="form-horizontal m-t-20">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <ul class="parsley-errors-list filled" id="parsley-id-31">
                        <li class="parsley-required">{{ $errors->first('email') }}</li>
                    </ul>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password'))
                    <ul class="parsley-errors-list filled" id="parsley-id-31">
                        <li class="parsley-required">{{ $errors->first('password') }}</li>
                    </ul>
                @endif
            </div>

            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('password_confirmation'))
                    <ul class="parsley-errors-list filled" id="parsley-id-31">
                        <li class="parsley-required">{{ $errors->first('password_confirmation') }}</li>
                    </ul>
                @endif
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary pull-right">
                        Reset Password
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
