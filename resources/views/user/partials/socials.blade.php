<div class="mt-3" id="socials">
    @if($user->isAuthenticated())
        @include('modals.edit-socials')
    @endif
    @if(!empty($user->socialLinks))


    @foreach($user->socialLinks as $social)
        <a  class="socialLinkBtn text-muted" href="{{$social->url}}" target="_blank">{{ $social->label }}</a>
    @endforeach


    @endif
    @if($user->isAuthenticated())
        <button type="button" data-toggle="modal" data-target="#manageSocialsModal" class="btn btn-outline-success">My Social Links</button>
    @endif

</div>