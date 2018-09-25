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
    
                    @if($user->isAuthenticated())
                    <div>
                        <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#addProjectModal">NEW  Project</button>
                    </div>
                    @endif
                    
                 <!-- TESTING UI -->
                 
    
            </div>
            </section>
    
    
</div>
@if(count($user->projects) > 0)
<div>
                    
            <div class="mt-4">
                
                <div class="row">
                        <div class="col-md-4"></div>
                        
                        <h1 class="col-md-4"> Projects </h1>
                    <div class="col-md-4 mt-2">
                        Filters:
                        <select class="custom-select">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                                </select>
                    </div>
                </div>
            </div>
    
            <div class="row mt-3">
                    <!-- <div class="col-md-4"></div> -->
                @foreach($user->projects as $project)
                   
                    @include('user.partials.project')    

                @endforeach
            </div>
                                
</div>
@endif     
            @if($user->isAuthenticated())
                @include('modals.add-project')
                @include('modals.add-panel')
                @if( count($user->projects) > 0 )
                    @include('modals.confirm-delete-project')
                @endif
            @endif
@endsection
