@extends('modals.generic')

@section('modal-id')
manageSocialsModal
@overwrite

@section('modal-title')
    Manage your Social Links
@overwrite

@section('modal-body')
@if($user->socialLinks->isEmpty())
    <div><span class="strong">You have no social links</span></div>
@else
<ul>
    @foreach($user->socialLinks as $social)
        <li>{{ $social->label }}: {{$social->url}} 
            
                <button type="button" onclick="sendForm( {{'`deleteLink' . $social->id . '`,this' }} )">X</button>
                <form id="{{ 'deleteLink' . $social->id }}" method="post" action="{{ url($user->name . '/socials/'. $social->id) }}">
                    @csrf
                    {{ method_field('delete') }}
                </form>
        </li>
    @endforeach
</ul>

@endif
<br>
        <form method="post" action="{{ auth()->user()->getUsername() . '/socials' }}">
            @if(session('source') == 'addSocial' && $errors->any())
            <ul class="alert alert-danger" role="alert">
              @foreach($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
            @endif
                <div class="form-row align-items-center">
                  
                  @csrf
                  <div class="col-sm-3 my-1 ">
                    <label class="sr-only" for="label">Label</label>
                    <input type="text" name="label" class="form-control {{ session('source') == 'addSocial' && $errors->has('label') ? ' is-invalid' : '' }}" id="label" placeholder="Label" value="{{ old('label') }}">
                    
                  </div>
                  <div class="col-sm-7 my-1">
                    <label class="sr-only" for="url">URL</label>
                    <div class="input-group">
                      <input type="text" name="url" class="form-control {{ session('source') == 'addSocial' && $errors->has('url') ? ' is-invalid' : '' }}" id="url" placeholder="URL" value="{{ old('url') }}">
                     
                    </div>
                  </div>
                  <div class="col-auto my-1 ">
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </div>
              </form>

@overwrite

@section('modal-footer')
<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

  @if( session('source') == 'addSocial' && $errors->any() )
  <script>
     $(document).ready(function () {
      $('#manageSocialsModal').modal('show');
     });
  </script>
    @endif
@overwrite
