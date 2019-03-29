<!-- Logo Field -->
<div class="row form-justify-container">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="form-group dashboard-image d-flex justify-content-center">
                    {!!  $dto->getImageUrl() ? ("<img class='show-image' src=" . $dto->getImageUrl()) . " />" : ('') !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Name Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('name', 'Name: ') }}
                        {{ $dto->getName() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Link Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('link', 'Link: ') }}
                        {{ Html::link($dto->getLink(), 'Click here') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Country Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('country', 'Country: ') }}
                        {{ $dto->getCountry() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- City Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('city', 'City: ') }}
                        {{ $dto->getCity() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row form-justify-container">
    <!-- Participants limit limit Field -->
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    <p>
                        {{ Form::label('participants_limit', 'Participants limit (0 - without limit): ') }}
                        {{ $dto->getParticipantsLimit() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @if($dto->getCompanyName())
    <!-- Company Field -->
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <div class="form-group">
                        <p>
                            {{ Form::label('company', 'Company: ') }}
                            {{ $dto->getCompanyName() }}
                        </p>
                    </div>
                </div>

            </div>
        </div>
    @endif
</div>

<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Proof type Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('proof_type', 'Proof type: ') }}
                        {{ $dto->getProofType() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    @if($dto->isMultipleProofItems())
        <div class="col-md-6">
            <div class="box">
                <div class="box-body">
                    <!-- Items count in proof Field -->
                    <div class="form-group">
                        <p>
                            {{ Form::label('items_count_in_proof', 'Required count of items for proof: ') }}
                            {!! $dto->getRequiredProofItems() !!}
                        </p>
                    </div>
                </div>
                </div>
            </div>
        </div>
    @endif
</div>

@if($dto->getVideoDuration())
    <div class="row form-justify-container">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <!-- Video duration Field -->
                    <div class="form-group">
                        <p>
                            {!! Html::decode(Form::label('video_duration', 'Video duration <span class="fa fa-clock-o"></span>')) !!}
                            {{ $dto->getVideoDuration() }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Start date Field -->
                <div class="form-group">
                    <p>
                        {!! Html::decode(Form::label('start_date', 'Start date <span class="fa fa-calendar"></span>')) !!}
                        {{ $dto->getStartDate() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- End date Field -->
                <div class="form-group">
                    <p>
                        {!! Html::decode(Form::label('end_date', 'End date <span class="fa fa-calendar"></span>')) !!}
                        {{ $dto->getEndDate() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Description field -->
<div class="row form-justify-container">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body d-flex justify-content-center">
                {{ Form::label('description', 'Description') }}
            </div>
        </div>
    </div>
</div>

<!-- Description field -->
<div class="row form-justify-container">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body d-flex justify-content-center">
                {{ $dto->getDescription() }}
            </div>
        </div>
    </div>
</div>

