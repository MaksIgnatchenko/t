<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Name Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('name', 'Name ') }}
                        {!! Form::text('name', $company->name, ['class' => 'form-control', 'maxlength' => 50]) !!}
                    </p>
                    @if ($errors->has('name'))
                        <div class="text-red">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <!-- Company logo Field -->
                <div class="form-group">
                    {!! Form::label('company-logo', 'Company logo ') !!}
                </div>
                <div class="form-group dropzone company-logo-dropzone dz-clickable"></div>
                <div class="form-group" hidden>
                    {!! Form::text('logo', $company->getOriginal('logo'), ['class' => 'form-control']) !!}
                </div>
                <!-- Info Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('info', 'Info ') }}
                    </p>
                    {!! Form::textarea('info', $company->info, ['class' => 'form-control', 'maxlength' => 1000]) !!}
                    @if ($errors->has('info'))
                        <div class="text-red">{{ $errors->first('info') }}</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <div class="form-group">
                    @if (old('logo'))
                        <img class="dashboard-image" src="{{Storage::url(old('logo'))}}">
                    @elseif($company->logo)
                        <img class="dashboard-image" src="{{ $company->logo }}">
                    @else
                        <img class="dashboard-image" style="display:none" src="">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row form-justify-container">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <!-- Submit Field -->
                <div class="form-group text-right d-flex justify-content-center">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>
            </div>
        </div>
    </div>
</div>





