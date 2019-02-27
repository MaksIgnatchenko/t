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

<!-- Image Field -->
<div class="form-group image-field">
    <p>
        {{ Form::label('image', 'Image: ') }}
    </p>
    {!! Form::file('image', ['class' => 'form-control file']) !!}
    @if ($errors->has('image'))
        <div class="text-red">{{ $errors->first('image') }}</div>
    @endif
</div>

<!-- Description field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description: ') }}
    </p>
    {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => 1000]) !!}
    @if ($errors->has('description'))
        <div class="text-red">{{ $errors->first('description') }}</div>
    @endif
</div>

<!-- Link Field -->
<div class="form-group">
    <p>
        {{ Form::label('link', 'Link: ') }}
    </p>
    {!! Form::text('link', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
    @if ($errors->has('link'))
        <div class="text-red">{{ $errors->first('link') }}</div>
    @endif
</div>

<!-- Country Field -->
<div class="form-group">
    <p>
        {{ Form::label('country', 'Country: ') }}
    </p>
    {!! Form::select('country', $dto->getCountries(), ['class' => 'form-control'], ['placeholder' => 'Select country']) !!}
    @if ($errors->has('country'))
        <div class="text-red">{{ $errors->first('country') }}</div>
    @endif
</div>

<!-- City Field -->
<div class="form-group">
    <p>
        {{ Form::label('city', 'City: ') }}
        {!! Form::text('city', null, ['class' => 'form-control', 'maxlength' => 50]) !!}
    </p>
    @if ($errors->has('city'))
        <div class="text-red">{{ $errors->first('city') }}</div>
    @endif
</div>

<!-- Company Field -->
<div class="form-group">
    <p>
        {{ Form::label('company_id', 'Company: ') }}
    </p>
    {!! Form::select('company_id', $dto->getCompanies(), ['class' => 'form-control'], ['placeholder' => 'Select company']) !!}
    @if ($errors->has('company_id'))
        <div class="text-red">{{ $errors->first('company_id') }}</div>
    @endif
</div>

<!-- Participants_limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('participants_limit', 'Participants limit: ') }}
        {!! Form::text('participants_limit', null, ['class' => 'form-control', 'maxlength' => 10]) !!}
    </p>
    @if ($errors->has('participants_limit'))
        <div class="text-red">{{ $errors->first('participants_limit') }}</div>
    @endif
</div>


<!-- Proof type Field -->
<div class="form-group">
    <p>
        {{ Form::label('proof_type', 'Proof type: ') }}
    </p>
    {!! Form::select('proof_type', $dto->getProofTypes(), ['class' => 'form-control'], ['placeholder' => 'Select proof type']) !!}
    @if ($errors->has('proof_type'))
        <div class="text-red">{{ $errors->first('proof_type') }}</div>
    @endif
</div>

<!-- Start date Field -->
<div class="form-group">
    <p>
        {{ Form::label('start_date', 'Start date: ') }}
        {!! Form::text('start_date', null, ['class' => 'form-control dateField']) !!}
    </p>
    @if ($errors->has('start_date'))
        <div class="text-red">{{ $errors->first('start_date') }}</div>
    @endif
</div>

<!-- End date Field -->
<div class="form-group">
    <p>
        {{ Form::label('end_date', 'End date: ') }}
        {!! Form::text('end_date', null, ['class' => 'form-control dateField']) !!}
    </p>
    @if ($errors->has('end_date'))
        <div class="text-red">{{ $errors->first('end_date') }}</div>
    @endif
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

<script>
    const imageSizeLimit = {!! config('custom.challenge_logo_max_size') !!}
</script>
