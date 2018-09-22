@extends('layouts.main')

@section('content')

<div class="row">
       
                <section id="side" class=" col-md-4">
    
                   @include('user.partials.about')
                   
                   @include('user.partials.socials')
                </section>
                
                <section id="center" class=" col-md-8 ">
                   @if($user->isAuthenticated())
                    <div>
                        <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#addPanelModal">NEW  PANEL</button>
                    </div>
                    @endif

                    @include('user.partials.panels')
    
                    <div>
                        <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#addProjectModal">NEW  Project</button>
                    </div>

                 
    
            </div>
            </section>
    
    
</div>
<div class="" style="width:100%">
                    
            <div class="mt-4">
                <h1> Projects </h1>
                <div>
                    Filters:
                    <select class="custom-select">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                            </select>
                </div>
            </div>
    
            <div class="row">
                @foreach($user->projects as $project)
                    @include('modals.edit-project')
                    @include('modals.confirm-delete-project')
                <div class="col-md-4">                                            
                    <div class="project card shadow-sm">
                        @include('user.partials.project-dd')
                        <img class="card-img-top" src="{{ $project->getImageUrl() }}" alt="Card image cap">
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
                @endforeach
            </div>
                                
</div>
                
            @if($user->isAuthenticated())
                @include('modals.add-project')
                @include('modals.add-panel')
            @endif
@endsection
