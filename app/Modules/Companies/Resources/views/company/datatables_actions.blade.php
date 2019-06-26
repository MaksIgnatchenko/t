<div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Actions
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
        <a href="{{ route('company.show', $id) }}" class='dropdown-item'>
            Show
        </a>
        <a href="{{ route('company.edit', $id) }}" class='dropdown-item'>
            Edit
        </a>
        <a href="{{ route('company.destroy', $id) }}" class='dropdown-item'>
            Delete
        </a>
    </div>
</div>
