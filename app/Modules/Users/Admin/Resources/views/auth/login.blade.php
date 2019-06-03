@extends('layouts.auth')



@section('content')
    <h4 class="text-muted text-center font-18"><b>@lang('auth.sign_in')</b></h4>

    <div class="p-3">
        <form class="form-horizontal m-t-20" method="post" action="{{ route('login') }}">
            @csrf
            <div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
                <div class="col-12">
                    <input id="username" type="text" name="username" class="form-control" required autofocus
                           placeholder="@lang('auth.username_placeholder')" value="{{ old('username') }}">
                    @if ($errors->has('username'))
                        <ul class="parsley-errors-list filled" id="parsley-id-31">
                            <li class="parsley-required">{{ $errors->first('username') }}</li>
                        </ul>
                    @endif
                </div>
            </div>

            <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                <div class="col-12">
                    @if ($errors->has('password'))
                        <ul class="parsley-errors-list filled" id="parsley-id-31">
                            <li class="parsley-required">{{ $errors->first('password') }}</li>
                        </ul>
                    @endif
                    <input id="password" class="form-control" type="password" name="password" required
                           placeholder="@lang('auth.password_placeholder')">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck1">@lang('auth.remember_me')</label>
                    </div>
                </div>
            </div>

            <div class="form-group text-center row m-t-20">
                <div class="col-12">
                    <button class="btn btn-primary btn-block waves-effect waves-light"
                            type="submit">@lang('auth.login')</button>
                </div>
            </div>
        </form>
    </div>
@endsection
