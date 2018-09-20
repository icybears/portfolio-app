@extends('modals.generic')

@section('modal-id')
editProjectModal{{$project->id}}
@overwrite

@section('modal-title')
    Edit Project
@overwrite

@section('modal-body')
<form id="editProjectForm{{$project->getId()}}" method="post" enctype="multipart/form-data" action="{{ auth()->user()->getUsername() . '/projects/' . $project->getId() }}">
    @csrf
    {{ method_field('patch') }}
    <div id="imgPreviewWrapper">
        <img id="projectPreview" class="d-block mx-auto rounded-circle" src="{{ $project->getImage() }}" alt="{{ $project->getImage() }}">
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
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="The title of your project" value="{{ old('title') ?? $project->getTitle() }} ">
        @if ($errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    
    </div>

   

    <div class="form-group">
            <label for="description">Description</label>
           <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" placeholder="A short description" rows="4">{{ old('description') ?? $project->getDescription() }}</textarea>
           @if ($errors->has('description'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('description') }}</strong>
           </span>
           @endif
    </div>
   

    <div class="form-group">
        <label for="link">Link (optional)</label>
        <input type="text" class="form-control {{ $errors->has('link') ? ' is-invalid' : '' }}"  id="link" name="link" placeholder="A link to your project" value="{{  old('link') ?? $project->getLink() }}">
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
              <button type="button" class="btn btn-primary" onclick="sendForm('editProjectForm{{$project->getId()}}')">Save changes</button>
         @if( $errors->any() )
            <script>
               window.onload = function () {
                $('#editProjectModal{{$project->getId()}}').modal('show');
               }
            </script>
         @endif
@overwrite
