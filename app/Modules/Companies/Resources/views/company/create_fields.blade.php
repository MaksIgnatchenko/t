<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {!! Form::text('name', null, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('name'))
        <div class="text-red">{{ $errors->first('name') }}</div>
    @endif
</div>

<!-- Logo Field -->
<div class="form-group image-field">
    <p>
        {{ Form::label('logo', 'Logo: ') }}
    </p>
    {!! Form::file('logo', ['class' => 'form-control file']) !!}
    @if ($errors->has('logo'))
        <div class="text-red">{{ $errors->first('logo') }}</div>
    @endif
</div>

<!-- About us Field -->
<div class="form-group">
    <p>
        {{ Form::label('info', 'Info: ') }}
    </p>
    {!! Form::textarea('info', null, ['class' => 'form-control', 'maxlength' => 1000]) !!}
    @if ($errors->has('info'))
        <div class="text-red">{{ $errors->first('info') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

<script>
    const imageSizeLimit = {!! config('custom.company_logo_max_size') !!}
</script>
