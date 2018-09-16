@extends('modals.generic')

@section('modal-id')
editSocialsModal
@overwrite

@section('modal-title')
    Manage your Social Links
@overwrite

@section('modal-body')
@if(empty($user->socialLinks))
    <div><span class="strong">You have no social links</span></div>
@else
<ul>
    @foreach($user->socialLinks as $social)
        <li>{{ $social->label }}: {{$social->url}} 
            
                <button type="button" {{ "onclick=sendForm('deleteLink". $social->id. "')"}}>X</button>
                <form id="{{ 'deleteLink'.$social->id }}" method="post" action="{{ url($user->name . '/social/'. $social->id) }}">
                    @csrf
                    {{ method_field('delete') }}
                </form>
        </li>
    @endforeach
</ul>

@endif

        <form method="post" action="{{ auth()->user()->getUsername() . '/social/add' }}">
                <div class="form-row align-items-center">
                  @csrf
                  <div class="col-sm-3 my-1 ">
                    <label class="sr-only" for="label">Label</label>
                    <input type="text" name="label" class="form-control" id="label" placeholder="Label">
                  </div>
                  <div class="col-sm-7 my-1">
                    <label class="sr-only" for="url">URL</label>
                    <div class="input-group">
                      <input type="text" name="url" class="form-control" id="url" placeholder="URL">
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

  @if( $errors->any() )
  <script>
     window.onload = function () {
      $('#editSocialsModal').modal('show');
     }
  </script>
    @endif
@overwrite
