<div class='btn-group'>
    <a href="{{ route('challenge.show', $id) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-eye-open"></i>
    </a>
    <a href="{{ route('challenge.proof.index', ['challenge' => $id]) }}" class='btn btn-primary'>
        <i class="glyphicon glyphicon-briefcase"></i>
    </a>
</div>
