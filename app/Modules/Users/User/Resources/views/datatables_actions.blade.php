<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="{{ route('users.show', $id) }}" class='dropdown-item'>
            Show
        </a>
        <a href="#" class='dropdown-item'
           onclick="document.getElementById('reset-{{$id}}-button').click()">
            {!! Form::open(['method'=>'PUT', 'url'=> route('users.update', $id)]) !!}
            <button hidden id="reset-{{$id}}-button" data-toggle="tooltip" data-placement="top" title="Reset tickets"
                    type="submit" class="dropdown-item"
                    onclick="return confirm('Are you sure you want reset user\'s tickets?');">
            </button>
            {!! Form::close() !!}
            Reset tickets
        </a>
    </div>
</div>
