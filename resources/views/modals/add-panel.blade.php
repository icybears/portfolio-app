@extends('modals.generic')

@section('modal-id')
addPanelModal
@overwrite

@section('modal-title')
Create a Panel
@overwrite

@section('modal-body')
<form id="addPanelForm" method="post"  action="{{ auth()->user()->getUsername() . '/panel/add' }}">
    @csrf

 

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="Title of this panel" value="{{ old('title') }}">
        @if ($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    
    </div>


    <div class="form-group">
            <label for="content">Content</label>
           <textarea name="content" class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" placeholder="Panel content" rows="7">{{ old('content') }}</textarea>
           @if ($errors->has('content'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('content') }}</strong>
           </span>
           @endif
    </div>
   
</form>
@overwrite

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" onclick="sendForm('addPanelForm')">Add</button>
         @if( $errors->any() )
            <script>
               window.onload = function () {
                $('#addPanelModal').modal('show');
               }
            </script>
         @endif
@overwrite