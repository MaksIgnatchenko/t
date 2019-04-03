<div class='btn-group'>
    <a href="{{ route('challenge.proof.show', ['challenge_id' => $challenge_id, 'proof' => $id]) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    @if($status === \App\Modules\Challenges\Enums\ProofStatusEnum::PENDING)
    <a href="#" class='btn btn-success'
        onclick="document.getElementById('accept-{{$id}}-button').click()">
        {!! Form::open(['method'=>'PUT', 'url'=> route('challenge.proof.update', ['challenge' => $challenge_id, 'proof' => $id])]) !!}
        {!! Form::hidden('status', \App\Modules\Challenges\Enums\ProofStatusEnum::ACCEPTED) !!}
        <button hidden id="accept-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Accept"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want accept this proof?');">
        </button>
        {!! Form::close() !!}
        <i class="glyphicon glyphicon-ok"></i>
    </a>
    <a href="#" class='btn btn-danger'
        onclick="document.getElementById('reject-{{$id}}-button').click()">
        {!! Form::open(['method'=>'PUT', 'url'=> route('challenge.proof.update', ['challenge' => $challenge_id, 'proof' => $id])]) !!}
        {!! Form::hidden('status', \App\Modules\Challenges\Enums\ProofStatusEnum::REJECTED) !!}
        <button hidden id="reject-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Reject"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want reject this proof?');">
        </button>
        {!! Form::close() !!}
        <i class="glyphicon glyphicon-remove"></i>
    </a>
    @endif
</div>
