<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {{ $company->name }}
    </p>
</div>

<!-- Image Field -->
<div class="form-group company-logo-image">
    <p>
        {{ Form::label('image', 'Image: ') }}
    </p>
    {!!  $company->logo ? ("<img class='show-image' src=" . $company->logo) . " />" : ('') !!}
</div>

<!-- Info field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description: ') }}
        {{ $company->info }}
    </p>
</div>
