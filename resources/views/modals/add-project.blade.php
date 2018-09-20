@extends('modals.generic')

@section('modal-id')
addProjectModal
@overwrite

@section('modal-title')
    New Project
@overwrite

@section('modal-body')
<form id="addProjectForm" method="post" enctype="multipart/form-data" action="{{ auth()->user()->getUsername() . '/projects/' }}">
    @csrf

    <div id="imgPreviewWrapper">
        <img id="projectPreview" class="d-block mx-auto rounded-circle" src="{{ ""}}" alt="{{ 'Project image' }}">
    </div>
    <div class="form-group">

        <label  for="image">Project Image</label>
        <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control-file {{ $errors->has('image') ? ' is-invalid' : '' }}" id="image"
        onchange="document.getElementById('projectPreview').src = window.URL.createObjectURL(this.files[0])"
        >
        
        @if ($errors->has('image'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
    
    </div>

    <div class="form-group">
        <label for="title">Project title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="The title of your project" value="{{ old('title') }} ">
        @if ($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    
    </div>

   

    <div class="form-group">
            <label for="description">Description</label>
           <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" placeholder="A short description" rows="4">{{ $user->description or old('description') }}</textarea>
           @if ($errors->has('description'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('description') }}</strong>
           </span>
           @endif
    </div>
   

    <div class="form-group">
        <label for="link">Link (optional)</label>
        <input type="text" class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}"  id="link" name="link" placeholder="A link to your project" value="{{  old('link') }}">
        @if ($errors->has('link'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('link') }}</strong>
        </span>
        @endif
</div>
</form>
@overwrite

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="sendForm('addProjectForm')">Save changes</button>
         @if( $errors->any() )
            <script>
               window.onload = function () {
                $('#addProjectModal').modal('show');
               }
            </script>
         @endif
@overwrite
