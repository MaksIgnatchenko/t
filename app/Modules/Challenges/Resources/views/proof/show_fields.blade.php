<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Name Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('user', 'User ') }}
                        {!!  Html::link($dto->getUserLink(), $dto->getUserName()) !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Name Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('challenge', 'Challenge ') }}
                        {!!  Html::link($dto->getChallengeLink(), $dto->getChallengeName()) !!}
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
                <!-- Status Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('status', 'Status ') }}
                        {{ $dto->getProofStatus() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <!-- Send time Field -->
                <div class="form-group">
                    <p>
                        {{ Form::label('created_at', 'Send time ') }}
                        {{ $dto->getSendTime() }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row form-justify-container">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <!-- Items Field -->
                <ul class="proofs_list">
                    @foreach($dto->getItems() as $item)
                        <li class="proof__item">
                            {!! $dto->buildItemTag($item) !!}
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>

@if($dto->isAbleForChangeStatus())
    {!! Form::open(['method'=>'PUT', 'url'=> route('challenge.proof.update', ['challenge' => $dto->getChallengeId(), 'proof' => $dto->getProofId()])]) !!}
    {{ Form::hidden('status', \App\Modules\Challenges\Enums\ProofStatusEnum::PENDING) }}
        <div class="row form-justify-container">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-body">
                        <!-- Accept button -->
                        <a class="change-proof-status-button btn btn-success" status="{{ \App\Modules\Challenges\Enums\ProofStatusEnum::ACCEPTED }}">Accept</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-body">
                        <!-- Reject button -->
                        <a class="change-proof-status-button btn btn-danger" status="{{ \App\Modules\Challenges\Enums\ProofStatusEnum::REJECTED }}">Reject</a>
                    </div>
                </div>
            </div>
        </div>
    <!-- Submit Field -->
    {!! Form::submit('Save', ['class' => 'hidden-submit']) !!}
    {!! Form::close() !!}
@endif


