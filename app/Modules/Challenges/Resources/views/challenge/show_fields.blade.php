<!-- Name Field -->
<div class="form-group">
    <p>
        {{ Form::label('name', 'Name: ') }}
        {{ $dto->getName() }}
    </p>
</div>

<!-- Image Field -->
<div class="form-group company-logo-image">
    <p>
        {{ Form::label('image', 'Image: ') }}
    </p>
    {!!  $dto->getImageUrl() ? ("<img class='show-image' src=" . $dto->getImageUrl()) . " />" : ('') !!}
</div>

<!-- Description field -->
<div class="form-group">
    <p>
        {{ Form::label('description', 'Description: ') }}
        {{ $dto->getDescription() }}
    </p>
</div>

<!-- Link Field -->
<div class="form-group">
    <p>
        {{ Form::label('link', 'Link: ') }}
        {{ $dto->getLink() }}
    </p>
</div>
<!-- Country Field -->
<div class="form-group">
    <p>
        {{ Form::label('country', 'Country: ') }}
        {{ $dto->getCountry() }}
    </p>
</div>

<!-- City Field -->
<div class="form-group">
    <p>
        {{ Form::label('city', 'City: ') }}
        {{ $dto->getCity() }}
    </p>
</div>

<!-- Company Field -->
<div class="form-group">
    <p>
        {{ Form::label('company', 'Company: ') }}
        {{ $dto->getCompanyName() }}
    </p>
</div>

<!-- Proof type Field -->
<div class="form-group">
    <p>
        {{ Form::label('proof_type', 'Proof type: ') }}
        {{ $dto->getProofType() }}
    </p>
</div>

<!-- Participants limit limit Field -->
<div class="form-group">
    <p>
        {{ Form::label('participants_limit', 'Participants limit: ') }}
        {{ $dto->getParticipantsLimit() }}
    </p>
</div>

<!-- Start date Field -->
<div class="form-group">
    <p>
        {{ Form::label('start_date', 'Start date: ') }}
        {{ $dto->getStartDate() }}
    </p>
</div>

<!-- End date Field -->
<div class="form-group">
    <p>
        {{ Form::label('end_date', 'End date: ') }}
        {{ $dto->getEndDate() }}
    </p>
</div>