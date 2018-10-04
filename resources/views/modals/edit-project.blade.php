@extends('modals.generic')

@section('modal-id')
editProjectModal{{$project->getId()}}
@overwrite

@section('modal-title')
    Edit Project
@overwrite

@section('modal-body')
<form id="editProjectForm{{$project->getId()}}" method="post" enctype="multipart/form-data" action="{{ auth()->user()->getUsername() . '/projects/' . $project->getId() }}">
    @csrf
    {{ method_field('patch') }}
   
    <div class="projectPreviewWrapper">
        <img id="projectPreviewEdit{{$project->getId()}}" class="d-block mx-auto " src="{{ $project->getImageUrl() }}" alt="{{ $project->getTitle() .' Image' }}">
    </div>
    <div class="form-group">

        <label  for="image">Project Image</label>
        <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control-file {{ (session('modal') == strval($project->getId()) && $errors->has('image')) ? ' is-invalid' : '' }}" 
        onchange="document.getElementById('projectPreviewEdit{{ $project->getId() }}').src = window.URL.createObjectURL(this.files[0])"
        >
        <small class="form-text text-muted">max. 2MB</small>
        
        @if (session('modal') == strval($project->getId()) && $errors->has('image'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
    
    </div>

    <div class="form-group">
        <label for="title">Project title</label>
        <input type="text" class="form-control {{ (session('modal') == strval($project->getId()) && $errors->has('title')) ? ' is-invalid' : '' }}"  name="title" placeholder="The title of your project" value="{{ old('title') ?? $project->getTitle() }} ">
        @if (session('modal') == strval($project->getId()) && $errors->has('title'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    
    </div>

   

    <div class="form-group">
            <label for="description">Description</label>
           <textarea name="description" class="form-control {{ (session('modal') == strval($project->getId()) && $errors->has('description')) ? ' is-invalid' : '' }}"  placeholder="A short description" rows="4">{{ old('description') ?? $project->getDescription() }}</textarea>
           @if (session('modal') == strval($project->getId()) && $errors->has('description'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('description') }}</strong>
           </span>
           @endif
    </div>
   

    <div class="form-group">
        <label for="link">Link (optional)</label>
        <input type="text" class="form-control {{ (session('modal') == strval($project->getId()) && $errors->has('link')) ? ' is-invalid' : '' }}"  name="link" placeholder="A link to your project" value="{{  old('link') ?? $project->getLink() }}">
        @if (session('modal') == strval($project->getId()) && $errors->has('link'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('link') }}</strong>
        </span>
        @endif
</div>

<div class="form-group">
        <label for="tags">Tag(s)</label>
        <input type="text" class="form-control {{ (session('modal') == strval($project->getId()) && $errors->has('tags')) ? ' is-invalid' : '' }}" id="tags{{ $project->getId() }}" name="tags" placeholder="Comma separated tags e.g: creative, mobile, ..." value="{{ old('tags') ?? $project->getTags() }}">
        
        @if (session('modal') == strval($project->getId()) && $errors->has('tags'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('tags') }}</strong>
        </span>
    
        @endif
      
    </div>
</form>
@overwrite

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="sendForm('editProjectForm{{$project->getId()}}', this)">Save changes</button>
            
         @if(session('modal') == strval($project->getId()) &&  $errors->any() )
         
            <script>
                $(document).ready(function(){
                    $('#editProjectModal{{$project->getId()}}').modal('show');

                });
            </script>
         @endif
@overwrite
