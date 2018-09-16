<div id="socials">
    @include('modals.edit-socials')
    @if(!empty($user->socialLinks))


    @foreach($user->socialLinks as $social)
        <a class="btn" href="{{$social->url}}">{{ $social->label }}</a>
    @endforeach


@endif
    <button type="button" data-toggle="modal" data-target="#editSocialsModal" class="btn btn-success-outline">Add Social Links</button>

</div>