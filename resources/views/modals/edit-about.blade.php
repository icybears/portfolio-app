@extends('modals.generic')

@section('modal-id')
editAbout
@endsection

@section('modal-title')
    Edit "About You" Section
@endsection

@section('modal-body')
<form id="edit-about" method="post" action="{{ auth()->user()->name . '/about/edit' }}">
    @csrf
    <div class="form-group">
        <label for="fullName">Full Name</label>
        <input type="text" class="form-control {{ $errors->has('fullName') ? ' is-invalid' : '' }}" id="fullName" name="fullName" placeholder="Who you are" value="{{ $user->fullName or old('fullName') }} ">
        @if ($errors->has('fullName'))
        <span class="invalid-feedback">
            <strong>{{ $errors->first('fullName') }}</strong>
        </span>
        @endif
    
    </div>

    <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" class="form-control {{ $errors->has('occupation') ? ' is-invalid' : '' }}"  id="occupation" name="occupation" placeholder="Your occupation/title" value="{{ $user->occupation or old('occupation') }}">
            @if ($errors->has('occupation'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('occupation') }}</strong>
            </span>
            @endif
    </div>

    <div class="form-group">
            <label for="description">Description</label>
           <textarea name="description" class="form-control {{ $errors->has('description') ? ' is-invalid' : '' }}" id="description" placeholder="A short resume" rows="4">{{ $user->description or old('description') }}</textarea>
           @if ($errors->has('description'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('description') }}</strong>
           </span>
           @endif
    </div>
   
</form>
@endsection

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="sendForm('edit-about')">Save changes</button>
         @if( $errors->any() )
            <script>
               window.onload = function () {
                $('#editAbout').modal('show');
               }
            </script>
         @endif
@endsection
