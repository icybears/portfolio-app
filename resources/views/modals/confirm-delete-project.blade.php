@extends('modals.generic')

@section('modal-id')
confirmDeleteProjectModal{{$project->getId()}}
confirmDeleteProjectModal{{$project->getId()}}
@overwrite

@section('modal-title')
Confirmation
@overwrite

@section('modal-body')
Are you sure you want to delete <strong>{{ $project->getTitle() }}</strong> ?
<form method="post" id="{{'deleteProjectForm' . $project->getId()}}" action="{{ url($user->getUsername() . '/projects/' . $project->getId() ) }}">
        @csrf
        {{ method_field('delete') }}
    </form>
@overwrite

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" onclick="sendForm( {{'`deleteProjectForm' . $project->getId() . '`'}} )">Yes, delete</button>
        
@overwrite