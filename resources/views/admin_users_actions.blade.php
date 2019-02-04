<div class="btn-group dropup">
    <a class="btn btn-success" href="#" style="width: auto">
        More options
    </a>
    <a class="btn btn-danger" href="#" style="width: auto"
       onclick="document.getElementById('delete-user-{{$id}}-button').click()">
        Delete
        {!! Form::open(['method'=>'DELETE', 'route'=>['users.destroy', $id]]) !!}
        <button hidden id="delete-user-{{$id}}-button" data-toggle="tooltip" data-placement="top"
                title="Delete"
                type="submit" class="dropdown-item"
                onclick="return confirm('Are you sure you want to delete this user?');">
            Delete
        </button>
        {!! Form::close() !!}
    </a>
</div>
