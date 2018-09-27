
<div id="about" class="shadow-sm bg-white component ">
    
        @if($user->isAuthenticated())
        @include('modals.edit-about')
        <button id="editAboutBtn" type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#editAboutModal">Edit</button>
        @endif
    <div id="profileImg">
        <img src="{{ $user->getImageUrl()}}" alt="{{ $user->getUsername() . ' Image' }}" class="d-block mx-auto rounded-circle">
    </div>
    <div class="text-center">
      
  
            
            @if( !is_null( $user->getFullName() ) )
                <h3>
                    {{ $user->getFullName() }}
                </h3>
            @else
             <div class="my-2">  
                  <button type="button" class="btn btn-outline-dark mx-auto" data-toggle="modal" data-target="#editAboutModal">Your Full Name</button>
            </div>
                 @endif

            @if( !is_null( $user->getOccupation() ) )
            <h6>
                {{ $user->getOccupation() }}
            </h6>
        @else
            <div class="my-2">
                <button type="button" class="btn btn-outline-dark mx-auto" data-toggle="modal" data-target="#editAboutModal">Your Occupation</button>
            </div>
        @endif
        @if( !is_null( $user->getDescription() ) )
        <p>
               {{ $user->getDescription() }}
        </p>
        @else
        <div class="my-2">
            <button type="button" class="btn btn-outline-dark mx-auto" data-toggle="modal" data-target="#editAboutModal">Short Resume</button>
        </div>
    @endif
        
    </div>


</div>