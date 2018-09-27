@extends('layouts.main')

@section('content')



<div class="row">
       
                <section id="side" class=" col-md-4">
    
                   @include('user.partials.about')
                   
                   @include('user.partials.socials')
                </section>
                
                <section id="center" class=" col-md-8 ">
                

                    @include('user.partials.panels')
    
                    <div class="row">
                    @if((count($user->projects) > 0) )
                     <div class="component my-4 bg-white shadow-sm col-md-12">
                            
                                    <h1> Projects </h1>
                                    Sort by Tags&nbsp;
                                    <select id="projects-sort" class="custom-select w-25">
                                        <option selected disabled hidden>Choose a tag</option>
                                        @foreach(App\User::getAllProjectsTags($user) as $tag)
                                            <option value="{{$tag}}">{{ $tag }}</option>
                                        @endforeach
                                    </select>
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
@if(count($user->projects) > 0)
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
            @endif
@endsection
