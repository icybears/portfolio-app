@extends('modals.generic')

@section('modal-id')
editSocialsModal
@overwrite

@section('modal-title')
    Manage your Social Links
@overwrite

@section('modal-body')
    <h1>Hello</h1>
@overwrite

@section('modal-footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="sendForm('editSocialsForm')">Save changes</button>
  @if( $errors->any() )
  <script>
     window.onload = function () {
      $('#editSocialsModal').modal('show');
     }
  </script>
@endif
@overwrite
