@extends('modals.generic')

@section('modal-id')
userSettingsModal
@overwrite

@section('modal-title')
User Settings
@overwrite

@section('modal-body')
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        
        <li class="nav-item">
          <a class="nav-link {{session('source') != 'changePassword' ? 'active show' : '' }} " id="pills-username-tab" data-toggle="pill" href="#pills-username" role="tab" aria-controls="pills-username" aria-selected="false">Username</a>
        </li>

        <li class="nav-item">
                <a class="nav-link {{session('source') == 'changePassword' ? 'active show' : '' }}" id="pills-password-tab" data-toggle="pill" href="#pills-password" role="tab" aria-controls="pills-password" aria-selected="true">Password</a>
        </li>
   
      </ul>
      <div class="tab-content" id="pills-tabContent">
 <div class="tab-pane fade {{session('source') != 'changePassword' ? 'active show' : '' }}" id="pills-username" role="tabpanel" aria-labelledby="pills-username-tab">

        <form id="changeUsernameForm" method="post"  action="{{ auth()->user()->getUsername() . '/settings/username'}}">
                @csrf
            
        {{ method_field('patch') }}
    
        <div class="form-group">
                <label for="currentUsername">Your Current Username</label>
                <input type="text" disabled class="form-control" id="currentUsernme" name="currentUsername"  value="{{ auth()->user()->getUsername() }}">
        </div>
        <div class="form-group">
            <label for="newUsername">New Username</label>
            <input type="text" class="form-control {{ session('source') == 'changeUsername' && $errors->has('newUsername') ? ' is-invalid' : '' }}" id="newUsername" name="newUsername" placeholder="Your new username" value="{{ old('newUsername') }}">
            @if (session('source') == 'changeUsername' && $errors->has('newUsername'))
            <span class="invalid-feedback">
                <strong>{{ $errors->first('newUsername') }}</strong>
            </span>
            @endif
        </div>
    
        <div class="form-group">
                <label for="currentPassword">Your Current Password</label>
                <input type="password" class="form-control {{ session('source') == 'changePassword' && $errors->has('currentPassword') ? ' is-invalid' : '' }}"  name="currentPassword" placeholder="Your current password" >
                @if (session('source') == 'changeUsername' && $errors->has('currentPassword'))
                <span class="invalid-feedback">
                    <strong>{{ $errors->first('currentPassword') }}</strong>
                </span>
                @endif
            </div>
            <br>
            <button type="submit" class="btn btn-primary">Change Username</button>
        @if(session('source') == 'changeUsername' && $errors->any() )
            <script>
                        $(document).ready(function(){
                        $('#userSettingsModal').modal('show');
                        });
                    </script>
                @endif
            </form>
            

</div>
<div class="tab-pane fade show {{session('source') == 'changePassword' ? 'active show' : '' }}" id="pills-password" role="tabpanel" aria-labelledby="pills-password-tab">
        <form id="changePasswordForm" method="post"  action="{{ auth()->user()->getUsername() . '/settings/password'}}">
                @csrf
            
                {{ method_field('patch') }}
            
                <div class="form-group">
                    <label for="newPassword">New Password</label>
                    <input type="password" class="form-control {{ session('source') == 'changePassword' && $errors->has('newPassword') ? ' is-invalid' : '' }}" id="newPassword" name="newPassword" placeholder="Your new password" value="">
                    @if (session('source') == 'changePassword' && $errors->has('newPassword'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('newPassword') }}</strong>
                    </span>
                    @endif
                </div>
                <div class="form-group">
                        <label for="newPassword_confirmation">New Password Confirmation</label>
                        <input type="password" class="form-control {{ session('source') == 'changePassword' && $errors->has('newPassword_confirmation') ? ' is-invalid' : '' }}" id="newPassword_confirmation" name="newPassword_confirmation" placeholder="Confirm new password" >
                        @if (session('source') == 'changePassword' && $errors->has('newPassword_confirmation'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('newPassword_confirmation') }}</strong>
                        </span>
                        @endif
                    </div>
                <div class="form-group">
                        <label for="currentPassword">Your Current Password</label>
                        <input type="password" class="form-control {{ session('source') == 'changePassword' && $errors->has('currentPassword') ? ' is-invalid' : '' }}" name="currentPassword" placeholder="Your current password" >
                        @if (session('source') == 'changePassword' && $errors->has('currentPassword'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('currentPassword') }}</strong>
                        </span>
                        @endif
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Change Password</button>
                @if(session('source') == 'changePassword' && $errors->any() )
                    <script>
                        $(document).ready(function(){
                        $('#userSettingsModal').modal('show');
                        });
                    </script>
                @endif
            </form>
</div>


@overwrite

@section('modal-footer')
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      
@overwrite