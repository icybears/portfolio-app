@extends('modals.generic')

@section('modal-id')
editSocialsModal
@endsection

@section('modal-title')
    Manage your Social Links
@endsection

@section('modal-body')

@endsection

@section('modal-footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary" onclick="sendForm('editSocialsForm')">Save changes</button>
@if( $errors->any() )
<script>
   window.onload = function () {
    $('#editSocials').modal('show');
   }
</script>
@endif
@endsection