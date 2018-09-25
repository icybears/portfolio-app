@if($user->isAuthenticated())
    @include('modals.edit-project')
@endif

<div class="col-md-4">                                            
<div class="project card shadow-sm" data-target="{{$project->getId()}}">
    @if($user->isAuthenticated())
        @include('user.partials.project-dd')
    @endif
    <img class="card-img-top" src="{{ $project->getImageUrl() }}" alt="{{$project->title . ' image' }}">
    <div class="card-body">
        <h5 class="card-title">{{ $project->title }}</h5>
        <p class="card-text">{{ $project->description }}</p>
        <p class="card-text">
            <small class="text-muted">
                tags: 
                @foreach(explode(",", $project->tags) as $tag)
                    <span class="badge badge-pill badge-success">{{ $tag }}</span>
                @endforeach
                
            </small></p>
    </div>
</div>
</div>