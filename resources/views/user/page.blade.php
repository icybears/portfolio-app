@extends('layouts.main')

@section('content')



<div class="row">
       
                <section id="side" class=" col-md-4">
    
                   @include('user.partials.about')
                   
                   @include('user.partials.socials')
                </section>
                
                <section id="center" class=" col-md-8 ">
                    
                    @if(count($user->projects) == 0 && count($user->panels) == 0)
                        <div class="noContent text-muted align-middle text-center font-weight-light"><span>Nothing to display here.</span>
                            @if($user->isAuthenticated())
                            <br>
                            You can <a  class="inline-link " href="" data-toggle="modal" data-target="#addPanelModal">add panels</a> or <a class="inline-link " href="" data-toggle="modal" data-target="#addProjectModal">add projects</a>
                            @endif
                        </div>
                    @endif

                    @include('user.partials.panels')
    
                    <div class="">
                    @if((count($user->projects) > 0) )
                     <div class="component my-3 bg-white shadow-sm col-md-12">
                            
                                    <h1> Projects </h1>
                                <div class="">
                                        <div class="row col-md-3">Sort by Tags&nbsp;</div>
                                        <select id="projects-sort" class="custom-select row col-md-4">
                                            <option selected disabled hidden>Choose a tag</option>
                                            @foreach(App\User::getAllProjectsTags($user) as $tag)
                                                <option value="{{$tag}}">{{ $tag }}</option>
                                            @endforeach
                                        </select>
                                </div>
                        </div>
                    @endif
                    </div>
                    
                    <div class="row">
                            @foreach($user->projects as $key => $project) 
                                @if($key > 1)
                                   @break
                                @endif
                                @include('user.partials.project')    
            
                            @endforeach

                    </div>
                    
    
                </section>
               
    
    
</div>
@if(count($user->projects) > 2)
<div>   

        <div id="layoutBreak" class="row">
            @foreach($user->projects as $key => $project)
                @if($key > 1)
                @include('user.partials.project') 
                
                @endif

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
                @include('modals.user-settings')
            @endif
@endsection
