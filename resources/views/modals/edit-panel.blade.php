@extends('modals.generic')

@section('modal-id')
editPanelModal{{$panel->id}}
@overwrite

@section('modal-title')
Edit a Panel
@overwrite

@section('modal-body')
<form id="editPanelForm{{$panel->id}}" method="post"  action="{{ auth()->user()->getUsername() . '/panels/'. $panel->id }}">
    @csrf

    {{ method_field('patch') }}

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="Title of this panel" value="{{ old('title') ?? $panel->getTitle()}}">
        @if ($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    
    </div>


    <div class="form-group">
            <label for="content">Content</label>
           <textarea name="content" class="form-control {{ $errors->has('content') ? ' is-invalid' : '' }}" id="content" placeholder="Panel content" rows="4">{{ old('content') ?? $panel->getContent() }}</textarea>
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
              <button type="button" class="btn btn-primary" onclick="sendForm('editPanelForm{{$panel->id}}')">Save changes</button>
         @if( $errors->any() )
            <script>
               window.onload = function () {
                $('#editPanelModal{{$panel->id}}').modal('show');
               }
            </script>
         @endif
@overwrite