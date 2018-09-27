@extends('layouts.main')

@section('content')



<div class="row">
       
                <section id="side" class=" col-md-4">
    
                   @include('user.partials.about')
                   
                   @include('user.partials.socials')
                </section>
                
                <section id="center" class=" col-md-8 ">
                

                    @include('user.partials.panels')
    
                    
                    @if((count($user->projects) > 0) )
                     <div class="component my-4 bg-white shadow-sm">
                            
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
            </section>
    
    
</div>
@if(count($user->projects) > 0)
<div>
                    
            
    
            <div class="row">
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
