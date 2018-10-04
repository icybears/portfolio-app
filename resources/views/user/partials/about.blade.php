
<div id="about" class="shadow-sm bg-white component ">
    
        @if($user->isAuthenticated())
        @include('modals.edit-about')
        <button id="editAboutBtn" type="button" class="btn btn-light" data-toggle="modal" data-target="#editAboutModal"><i class="fas fa-user-edit"></i></button>
        @endif
    <div id="profileImg">
        <img src="{{ $user->getImageUrl()}}" alt="{{ $user->getUsername() . ' Image' }}" class="d-block mx-auto rounded-circle">
    </div>
    <div class="text-center">
            @if( is_null($user->getFullName()) && is_null($user->getFullName()) && is_null($user->getFullName()) && !$user->isAuthenticated())
            <div class="my-4">
                <span class="text-muted">Currently Empty</span>
            </div>
            @endif
            @if( !is_null( $user->getFullName() ) )
                <h1>
                    {{ $user->getFullName() }}
                </h1>
            @else
                @if($user->isAuthenticated())
                <div class="my-2">  
                    <button type="button" class="btn btn-outline-dark mx-auto" data-toggle="modal" data-target="#editAboutModal">Your Full Name</button>
                </div>
                @endif
            @endif

            @if( !is_null( $user->getOccupation() ) )
            <h4>
                {{ $user->getOccupation() }}
            </h4>
        @else
        @if($user->isAuthenticated())
            <div class="my-2">
                <button type="button" class="btn btn-outline-dark mx-auto" data-toggle="modal" data-target="#editAboutModal">Your Occupation</button>
            </div>
            @endif
        @endif
        @if( !is_null( $user->getDescription() ) )
        <p>
               {{ $user->getDescription() }}
        </p>
        @else
        @if($user->isAuthenticated())
        <div class="my-2">
            <button type="button" class="btn btn-outline-dark mx-auto" data-toggle="modal" data-target="#editAboutModal">Short Resume</button>
        </div>
        @endif
    @endif
        
    </div>


</div>