<div class="dropdown">
    <a class="btn btn-secondary dropdown-toggle btn-sm float-right" href="#" role="button" id="dropdownMenuLink{{$panel->id}}" data-toggle="dropdown" aria-haspopup="true"
        aria-expanded="false">
          Options
        </a>

    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink{{$panel->id}}">

        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#editPanelModal{{$panel->id}}">Edit</button>
        <div class="dropdown-divider"></div>
        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#confirmDeletePanelModal{{$panel->id}}">Delete</button>
    </div>
</div>