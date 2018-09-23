<div class="dropdown ">
        <a class="btn btn-secondary dropdown-toggle btn-sm float-right project-dd" data-target="{{$project->getId()}}" data-target-name="{{ $project->getTitle() }}" href="" role="button" id="dropdownMenuLink{{$project->getId()}}" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
              Options
            </a>
    
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink{{$project->getId()}}">
    
            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#editProjectModal{{$project->getId()}}">Edit</button>
            <div class="dropdown-divider"></div>
            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#confirmDeleteProjectModal">Delete</button>
        </div>
    </div>