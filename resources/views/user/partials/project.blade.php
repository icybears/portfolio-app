@if($user->isAuthenticated())
    @include('modals.edit-project')
@endif

<div class=" project col-md-6 mb-3" data-tags="{{ $project->getTags() }}">                                            
<div class=" card shadow-sm" data-target="{{$project->getId()}}">
   
    @if($user->isAuthenticated())
        @include('user.partials.project-dd')
    @endif
    <img class="card-img-top" src="{{ $project->getImageUrl() }}" alt="{{$project->title . ' image' }}">
    <div class="card-body">
            @if($project->link)
            <div class="project-link"><a class="btn btn-primary btn-sm" href="{{ $project->link }}" target="_blank"><i class="fas fa-link"></i>&nbsp;Link</a></div>
            @endif
        <h5 class="card-title">{{ $project->title }}</h5>
        <p class="card-text">{{ $project->description }}</p>
        <p class="card-text">
            <span class="text-muted"> 
                @foreach(explode(",", $project->tags) as $tag)
                    <span class="badge badge-pill badge-success">{{ $tag }}</span>
                @endforeach
                
            </span></p>
    </div>
</div>
</div>