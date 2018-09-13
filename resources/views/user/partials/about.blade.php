
<div id="about" class="shadow-sm bg-white pl-2">
    
        @if($user->isAuthenticated())
        @include('modals.edit-about')
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#editAbout">Edit</button>
        @endif
    <div class="profileImg">
        <img src="https://picsum.photos/200/200/?random" alt="" class="d-block mx-auto rounded-circle">
    </div>
    <div class="text-center">
      
  
            
            @if( !is_null( $user->getFullName() ) )
                <h3>
                    {{ $user->getFullName() }}
                </h3>
            @else
                <button type="button" class="btn btn-secondary-outline">Set Your Full Name</button>
            @endif

            @if( !is_null( $user->getOccupation() ) )
            <h6>
                {{ $user->getOccupation() }}
            </h6>
        @else
            <button type="button" class="btn btn-secondary-outline">Set Your Occupation</button>
        @endif
        
    </div>


</div>