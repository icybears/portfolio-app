@extends('layouts.admin')


@section('content')
<h4>Edit User Information</h4>
<form id="editUser" method="post" action="{{ url('admin/users/'. $user->getId())  }}">
    @csrf
    {{ method_field('patch') }}
  
    <div class="form-group row">
        <label for="name" class="col-md-4 col-form-label text-md-right">Username</label>
        <div class="col-md-6">
            <input type="text" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="User name" value="{{$user->name or old('fullName') }}">
            @if ( $errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
        <div class="col-md-6">
            <input type="text" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" value="{{ $user->email or old('email') }}">
            @if ($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
    
    </div>

    <div class="form-group row">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

            @if ($errors->has('password'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
    </div>

    <div class="form-group row">
        <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
        </div>
    </div>


<div class="form-group row">
    <label for="premium" class="col-md-4 col-form-label text-md-right">Premium</label>
    <div class="col-md-6">
    <div class="custom-control custom-radio">
        <input type="radio" id="premium1" name="premium" class="custom-control-input" {{$user->isPremium() ? 'checked':'' }} value="true">
        <label class="custom-control-label" for="premium1">True</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" id="premium2" name="premium" class="custom-control-input" {{ (!$user->isPremium()) ? 'checked':'' }} value="false">
        <label class="custom-control-label" for="premium2">False</label>
      </div>
    </div>
</div>

<div class="form-group row">
    <label for="admin" class="col-md-4 col-form-label text-md-right">Admin</label>
    <div class="col-md-6">
    <div class="custom-control custom-radio">
        <input type="radio" id="admin1" name="admin" class="custom-control-input" {{ $user->hasAdminRole() ? 'checked' :'' }} value="true">
        <label class="custom-control-label" for="admin1">True</label>
      </div>
      <div class="custom-control custom-radio">
        <input type="radio" id="admin2" name="admin" class="custom-control-input" {{ (!$user->hasAdminRole()) ? 'checked' :''}} value="false">
        <label class="custom-control-label" for="admin2">False</label>
      </div>
    </div>
</div>
<div class="form-group row">
    <div class="col-md-8"></div>
    <div class="col-md-4"><button class="btn btn-primary" >Save changes</button></div>
</div>
    
    
</form>

@endsection