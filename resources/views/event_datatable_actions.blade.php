<div class="btn-group dropup">
    <a class="btn btn-success" href="{{ route('events.edit', $id) }}" style="width: auto">
        Edit Template
    </a>
    <a class="btn btn-danger" href="#" style="width: auto"
       onclick="document.getElementById('delete-event-{{$id}}-button').click()">
        Delete
        {!! Form::open(['method'=>'DELETE', 'route'=>['events.destroy', $id]]) !!}
        <button hidden id="delete-event-{{$id}}-button" data-toggle="tooltip" data-placement="top"
                title="Delete"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want to delete this event?');">
            Delete
        </button>
        {!! Form::close() !!}
    </a>
</div>
