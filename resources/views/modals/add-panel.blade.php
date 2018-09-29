@extends('modals.generic')

@section('modal-id')
addPanelModal
@overwrite

@section('modal-title')
Create a Panel
@overwrite

@section('modal-body')
<form id="addPanelForm" method="post"  action="{{ auth()->user()->getUsername() . '/panels' }}">
    @csrf

 

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ session('source') == 'addPanel' &&  $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="Title of this panel" value="{{ old('title') }}">
        @if (session('source') == 'addPanel' &&  $errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    
    </div>


    <div class="form-group">
            <label for="content">Content</label>
           <textarea  name="content" class="form-control {{ session('source') == 'addPanel' &&  $errors->has('content') ? ' is-invalid' : '' }}" id="content" placeholder="Panel content" data-provide="markdown" data-iconlibrary="fa-5" rows="8">{{ old('content') }}</textarea>
           @if (session('source') == 'addPanel' &&  $errors->has('content'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('content') }}</strong>
           </span>
           @endif
    </div>
    
</form>
@overwrite

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-success" onclick="sendForm('addPanelForm',this)">Save</button>
         @if( session('source') == 'addPanel' && $errors->any() )
            <script>
               $(document).ready(function () {
                $('#addPanelModal').modal('show');
               });
            </script>
         @endif
@overwrite