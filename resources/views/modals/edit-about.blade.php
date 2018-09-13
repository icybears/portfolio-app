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
        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Who you are" value="{{ $user->fullName }}">
    </div>

    <div class="form-group">
            <label for="occupation">Occupation</label>
            <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Your occupation/job/title" value="{{ $user->title }}">
    </div>

    <div class="form-group">
            <label for="description">Description</label>
           <textarea name="description" class="form-control" id="description" placeholder="A short resume" rows="4"></textarea>
    </div>
   
</form>
@endsection

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="sendForm('edit-about')">Save changes</button>
@endsection