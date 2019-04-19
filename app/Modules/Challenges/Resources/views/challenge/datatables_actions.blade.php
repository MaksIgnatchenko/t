<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a class="dropdown-item" href="{{ route('challenge.show', $id) }}">Show</a>
        <a class="dropdown-item" href="{{ route('challenge.edit', $id) }}">Edit</a>
        <a class="dropdown-item" href="{{ route('challenge.proof.index', ['challenge' => $id]) }}">Show proofs</a>
    </div>
</div>
