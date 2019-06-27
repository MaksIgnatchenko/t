<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
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
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body" id="company-component">
                <!-- Company Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('company_id', 'Company: ') }}
                        {!! Form::select('company_id', $dto->getCompanies(), $dto->getSelectedCompanyId(), ['placeholder' => 'Select company', 'class' => 'form-control']) !!}
                    </p>
                    @if ($errors->has('company_id'))
                        <div class="text-red">{{ $errors->first('company_id') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Link Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('link', 'Link: ') }}
                        {!! Form::text('link', null, ['class' => 'form-control', 'maxlength' => 100]) !!}
                    </p>
                    @if ($errors->has('link'))
                        <div class="text-red">{{ $errors->first('link') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6" id="country-component">
        <div class="box">
            <div class="box-body">
                <!-- Country Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('country_id', 'Country: ') }}
                        {!! Form::select('country', $dto->getCountries(), null, ['placeholder' => 'Select country', 'class' => 'form-control']) !!}
                    </p>
                    @if ($errors->has('country'))
                        <div class="text-red">{{ $errors->first('country') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
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
            </div>
        </div>
    </div>
    <div class="col-md-6" id="city-component">
        <div class="box">
            <div class="box-body">
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
            </div>
        </div>
    </div>

</div>

<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Proof type Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('proof_type', 'Proof type: ') }}
                    </p>
                    {!! Form::select('proof_type', $dto->getProofTypes(), null, ['class' => 'form-control', 'placeholder' => 'Select proof type']) !!}
                    @if ($errors->has('proof_type'))
                        <div class="text-red">{{ $errors->first('proof_type') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Items count in proof Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('items_count_in_proof', 'Required count of items for proof: ') }}
                    </p>
                    {!! Form::text('items_count_in_proof', null, ['class' => 'form-control']) !!}
                    @if ($errors->has('items_count_in_proof'))
                        <div class="text-red">{{ $errors->first('items_count_in_proof') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row form-justify-container" id="video-duration-section">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Video Length Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('video_duration', 'Video duration: ') }}
                    </p>
                    {!! Form::select('video_duration', $dto->getVideoLengthTypes(), null,  ['class' => 'form-control', 'placeholder' => 'Select video duration']) !!}
                    @if ($errors->has('video_duration'))
                        <div class="text-red">{{ $errors->first('video_duration') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Image Field -->
                <div class="form-group">
                    {!! Form::label('cover-image', 'Cover image') !!}
                </div>
                <div class="form-group dropzone challenge-logo-dropzone dz-clickable">
                </div>
                @if ($errors->has('image'))
                    <div class="alert alert-danger" role="alert">
                        <strong>{{ $errors->first('image') }}</strong></div>
                @endif
                <div class="form-group" hidden>
                    {!! Form::text('image', old('image'), ['class' => 'form-control']) !!}
                </div>

                <!-- Start date Field -->
                <div class="form-group">
                    <p>
                        {!! Html::decode(Form::label('start_date', 'Start date <span class="fa fa-calendar"></span>', ['class' => 'text-muted'])) !!}
                        <input name="start_date"
                               class="air-datepicker form-control"
                               readonly />
                    </p>
                    @if ($errors->has('start_date'))
                        <div class="text-red">{{ $errors->first('start_date') }}</div>
                    @endif
                </div>
                <!-- End date Field -->
                <div class="form-group">
                    <p>
                        {!! Html::decode(Form::label('end_date', 'End date <span class="fa fa-calendar"></span>', ['class' => 'text-muted'])) !!}
                        <input name="end_date"
                               class="air-datepicker form-control"
                               readonly />
                    </p>
                    @if ($errors->has('end_date'))
                        <div class="text-red">{{ $errors->first('end_date') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    @if (old('image'))
                        <img class="dashboard-image" src="{{Storage::url(old('image'))}}">
                    @else
                        <img class="dashboard-image" style="display:none" src="">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Description field -->
<div class="row form-justify-container">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
        <p>
            {{ Form::label('description', 'Description: ') }}
        </p>
        {!! Form::textarea('description', null, ['class' => 'form-control', 'maxlength' => 1000]) !!}
        @if ($errors->has('description'))
            <div class="text-red">{{ $errors->first('description') }}</div>
        @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group text-right">
    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
</div>

