<div class="row form-justify-container">
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <div class="card m-b-20 card-inverse text-black" style="background-color: #f0f1f4; border-color: white;">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-4"><p class="line-no-break">USER</p></div>
                            <div class="col-md-8"><p class="line-no-break">{!!  Html::link($dto->getUserLink(), $dto->getUserName()) !!}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4"><p class="line-no-break">CHALLENGE</p></div>
                            <div class="col-md-8"><p class="line-no-break">{!!  Html::link($dto->getChallengeLink(), $dto->getChallengeName()) !!}</p></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box">
            <div class="box-body">
                <div class="card m-b-20 card-inverse text-black" style="background-color: #f0f1f4; border-color: white;">
                    <div class="card-block">
                        <div class="row">
                            <div class="col-md-4">STATUS</div>
                            <div class="col-md-8">{{ $dto->getProofStatus() }}</div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">SEND TIME</div>
                            <div class="col-md-8">{{ $dto->getSendTime() }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if($dto->isAbleForChangeStatus())
    {!! Form::open(['method'=>'PUT', 'url'=> route('challenge.proof.update', ['challenge' => $dto->getChallengeId(), 'proof' => $dto->getProofId()])]) !!}
    {{ Form::hidden('status', \App\Modules\Challenges\Enums\ProofStatusEnum::PENDING) }}

        <div class="row form-justify-container buttons-block">
            <div class="col-md-6">
                <div class="button-items">
                    <button class="change-proof-status-button btn-block btn btn-success" status="{{ \App\Modules\Challenges\Enums\ProofStatusEnum::ACCEPTED }}">ACCEPT</button>
                </div>
            </div>
            <div class="col-md-6">
                <div class="button-items">
                    <button class="change-proof-status-button btn-block btn btn-danger" status="{{ \App\Modules\Challenges\Enums\ProofStatusEnum::REJECTED }}">REJECT</button>
                </div>
            </div>
        </div>
    <!-- Submit Field -->
    <button hidden id="change-status" data-toggle="tooltip" data-placement="top" title="Change-status"
            type="submit" class="dropdown-item"
            onclick="return confirm('Are you sure you want changes proof status?');">
    </button>
    {!! Form::close() !!}

@endif

<div class="row form-justify-container">
    <div class="col-md-12">
        <div class="card m-b-20 card-inverse text-white">
            <div class="card-block">
                <h4 class="mt-0 header-title proof__title">Proof items</h4>
            </div>

            <div class="card-block">
                @foreach($dto->getItems() as $item)
                    @if($dto->isVideoProof())
                        <div class="media m-b-30 img-responsive proof__container video_proof">
                            <video controls width="70%">
                                <source src="{{ $item }}" type="video/mp4">
                            </video>
                            <div class="video-format-no-supported">
                                <div class="card">
                                    <div class="card-block">
                                        <p> Sorry, your browser does not support this video format.</p>
                                        <p>Use another browser or download this video <a href="{{ $item }}" download>Download</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="media m-b-30 img-responsive proof__container">
                            <img class="mr-3 img-thumbnail proof__item" src="{{ $item }}">
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>




