@extends('modals.generic')

@section('modal-id')
confirmDeletePanelModal{{$panel->id}}
@overwrite

@section('modal-title')
Confirmation
@overwrite

@section('modal-body')
Are you sure you want to delete <strong>{{ $panel->getTitle() }}</strong> ?
<form method="post" id="{{'deletePanelForm' . $panel->id}}" action="{{ url($user->getUsername() . '/panel/' . $panel->id) }}">
        @csrf
        {{ method_field('delete') }}
    </form>
@overwrite

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" onclick="sendForm( {{'`deletePanelForm' . $panel->id . '`'}} )">Yes, delete</button>
        
@overwrite