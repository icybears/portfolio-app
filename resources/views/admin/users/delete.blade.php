@extends('modals.generic')

@section('modal-id')
confirmDeleteUser{{$user->id}}
@overwrite

@section('modal-title')
Confirmation
@overwrite

@section('modal-body')
Are you sure you want to delete user <strong>{{ $user->getUsername() }}</strong> ?
<form method="post" id="{{'deleteUserForm' . $user->id}}" action="{{ url('admin/users/' . $user->id) }}">
        @csrf
        {{ method_field('delete') }}
    </form>
@overwrite

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-danger" onclick="sendForm( {{'`deleteUserForm' . $user->id . '`,this'}} )">Yes, delete</button>
        
@overwrite