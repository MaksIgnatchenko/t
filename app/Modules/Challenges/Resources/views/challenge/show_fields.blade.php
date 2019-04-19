<div class="row">
    <div class="col-md-6" style="margin-bottom: 20px;">
        <a class="image-popup-no-margins" target="_blank" href="{{ $dto->getImageUrl() }}">
            {!!  $dto->getImageUrl() ? ("<img class='dashboard-image rounded-circle' src=" . $dto->getImageUrl()) . " />" : ('') !!}
        </a>
    </div>
    <div class="col-md-6">
        <div class="card m-b-20 card-inverse text-white" style="background-color: #333; border-color: #333;">
            <div class="card-block">
                <h3 class="card-title font-20 mt-0">Base info</h3>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">Name</div>
                    <div class="col-md-8">{{ $dto->getName() }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Link</div>
                    <div class="col-md-8">{{ Html::link($dto->getLink(), 'Click here') }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Company</div>
                    <div class="col-md-8">{{ $dto->getCompanyName() }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Status</div>
                    <div class="col-md-8">{{ $dto->getStatus() }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Start date <span class="fa fa-calendar"></span></div>
                    <div class="col-md-8">{{ $dto->getStartDate() }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">End date <span class="fa fa-calendar"></span></div>
                    <div class="col-md-8">{{ $dto->getEndDate() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card m-b-20 card-inverse text-white" style="background-color: #333; border-color: #333;">
            <div class="card-block">
                <h3 class="card-title font-20 mt-0">Location</h3>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">Country</div>
                    <div class="col-md-8">{{ $dto->getCountry() }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">City</div>
                    <div class="col-md-8">{{ $dto->getCity() }}</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card m-b-20 card-inverse text-white" style="background-color: #333; border-color: #333;">
            <div class="card-block">
                <h3 class="card-title font-20 mt-0">Participants</h3>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">Participants limit</div>
                    <div class="col-md-8">{{ $dto->getParticipantsLimit() }}</div>
                </div>
                <div class="row">
                    <div class="col-md-4">Participants now</div>
                    <div class="col-md-8">{{ $dto->getParticipantsCount() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card m-b-20 card-inverse text-white" style="background-color: #333; border-color: #333;">
            <div class="card-block">
                <h3 class="card-title font-20 mt-0">Proofs</h3>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-md-4">Proof type</div>
                    <div class="col-md-8">{{ $dto->getProofType() }}</div>
                </div>
                @if($dto->isMultipleProofItems())
                    <div class="row">
                        <div class="col-md-4">Required proof items count</div>
                        <div class="col-md-8">{{ $dto->getRequiredProofItems() }}</div>
                    </div>
                @endif
                @if($dto->getVideoDuration())
                    <div class="row">
                        <div class="col-md-4">Video duration</div>
                        <div class="col-md-8">{{ $dto->getVideoDuration() }}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="margin-bottom: 20px;">
                <a href="{{ route('challenge.proof.index', ['challenge' => $dto->getChallengeId()]) }}" class="btn btn-primary btn-block" role="button">Show proofs</a>
            </div>
            <div class="col-md-6" style="margin-bottom: 20px;">
                <a href="{{ route('challenge.edit', ['challenge' => $dto->getChallengeId()]) }}" class="btn btn-success btn-block" role="button">Edit challenge</a>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card m-b-20 card-inverse text-white" style="background-color: #333; border-color: #333;">
            <div class="card-block">
                <h3 class="card-title font-20 mt-0">Description</h3>
            </div>
            <div class="card-block">
                <p>{{ $dto->getDescription() }}</p>
            </div>
        </div>
    </div>
</div>


