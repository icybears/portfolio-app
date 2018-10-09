@extends('modals.generic')

@section('modal-id')
editAboutModal
@endsection

@section('modal-title')
    Edit "About You" Section
@endsection

@section('modal-body')
<form id="editAboutForm" method="post" enctype="multipart/form-data" action="{{ auth()->user()->getUsername() . '/about/edit' }}">
    @csrf

    

    <div id="imgPreviewWrapper">
        <img id="imgPreview" class="mx-auto rounded-circle" src="{{ $user->getImageUrl() }}" alt="{{ $user->getUsername() . ' profile picture' }}">
    </div>
   
    <div class="form-group">

        <label  for="image">Profile Picture</label>
        <input type="file" name="image" accept=".png, .jpg, .jpeg" class="form-control-file {{ session('source') == 'editAbout' && $errors->has('image') ? ' is-invalid' : '' }}" id="image"
        onchange="document.getElementById('imgPreview').src = window.URL.createObjectURL(this.files[0])"
        >
        <small class="form-text text-muted">max size 1MB, same width and height, max. 1000x1000</small>

        @if (session('source') == 'editAbout' && $errors->has('image'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
    
    </div>

    <div class="form-group">
        <label for="fullName">Full Name&nbsp;<small class="text-muted">(required)</small></label>
        <input type="text" class="form-control {{ session('source') == 'editAbout' && $errors->has('fullName') ? ' is-invalid' : '' }}" id="fullName" name="fullName" placeholder="Who you are" value="{{ old('fullName') ?? $user->fullName }}" required>
        @if (session('source') == 'editAbout' && $errors->has('fullName'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('fullName') }}</strong>
        </span>
        @endif
    
    </div>

    <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" class="form-control {{ session('source') == 'editAbout' && $errors->has('occupation') ? ' is-invalid' : '' }}"  id="occupation" name="occupation" placeholder="Your occupation/title" value="{{ old('occupation') ?? $user->occupation }}">
            @if (session('source') == 'editAbout' && $errors->has('occupation'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('occupation') }}</strong>
            </span>
            @endif
    </div>

    <div class="form-group">
            <label for="description">Short Resume</label>
           <textarea name="description" class="form-control {{ session('source') == 'editAbout' && $errors->has('description') ? ' is-invalid' : '' }}"  placeholder="A short resume" rows="4">{{ old('description') ?? $user->description }}</textarea>
           @if (session('source') == 'editAbout' && $errors->has('description'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('description') }}</strong>
           </span>
           @endif
    </div>
    
</form>
@endsection

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="sendForm('editAboutForm', this)">Save changes</button>
         @if( session('source') == 'editAbout' && $errors->any() )
            <script>
               $(document).ready(function () {
                
                   
                    $('#editAboutModal').modal('show');
               });
            </script>
         @endif
@endsection
