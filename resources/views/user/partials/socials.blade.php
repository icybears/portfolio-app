<div class="my-3" id="socials">
    @if($user->isAuthenticated())
        @include('modals.edit-socials')
    @endif
    @if(!empty($user->socialLinks))


    @foreach($user->socialLinks as $social)
        <a  class="btn btn-primary shadow-sm" href="{{$social->url}}" target="_blank">{{ $social->label }}</a>
    @endforeach


    @endif
    @if($user->isAuthenticated())
        <button type="button" data-toggle="modal" data-target="#manageSocialsModal" class="btn btn-light"><i class="fas fa-users"></i>&nbsp;Social Links</button>
    @endif

</div>