<div id="socials">
    @if($user->isAuthenticated())
        @include('modals.edit-socials')
    @endif
    @if(!empty($user->socialLinks))


    @foreach($user->socialLinks as $social)
        <a class="btn" href="{{$social->url}}">{{ $social->label }}</a>
    @endforeach


    @endif
    @if($user->isAuthenticated())
        <button type="button" data-toggle="modal" data-target="#manageSocialsModal" class="btn btn-success-outline">Add Social Links</button>
    @endif

</div>