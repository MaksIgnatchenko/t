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
    {!! Form::file('logo', false, ['class' => 'form-control imageField']) !!}
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
    var imageSizeLimit = {!! config('custom.company_logo_max_size') !!}
    var image = document.getElementById('logo');
    image.addEventListener('change', function() {
        if (this.files[0].size > imageSizeLimit) {
            alert("The image should be no more than " + imageSizeLimit / 1024 + "Kb");
            this.value = '';
        }
    });
</script>
