@extends('modals.generic')

@section('modal-id')
confirmDeleteProjectModal
@overwrite

@section('modal-title')
Confirmation
@overwrite

@section('modal-body')
Are you sure you want to delete <strong id="confirmed-project-title"></strong> ?
<form method="post" id="deleteProjectForm" action="{{ url($user->getUsername() . '/projects')}}">
        @csrf
        {{ method_field('delete') }}
    </form>
@overwrite

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" onclick="sendForm('deleteProjectForm', this)">Yes, delete</button>
        
@overwrite