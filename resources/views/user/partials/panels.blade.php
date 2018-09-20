@if(! empty($user->panels))
@foreach($user->panels as $panel)
    <div class="component my-4 bg-white shadow-sm">
            @if($user->isAuthenticated())
                @include('user.partials.panel-dd')
                @include('modals.confirm-delete-panel')
                @include('modals.edit-panel')
            @endif
            <h1>{{ $panel->getTitle() }}</h1>
            <div>
                {!! $panel->getParsedContent() !!}
            </div>
    </div>
@endforeach
@endif