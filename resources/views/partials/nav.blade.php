<nav class="bg-transparent">
    <div class="container">
        <nav class="navbar navbar-expand-md navbar-light">
            @if($user->isPremium())
                @if($user->isAuthenticated())
                    <a class="navbar-brand" href="#">Forewords</a>
                @endif
            @else
                <a class="navbar-brand" href="#">Forewords</a>
            @endif
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
       
            <div class="collapse navbar-collapse" id="navbarSupportedContent">    
            <ul class="row ml-auto navbar-nav"> 
            @if($user->isAuthenticated())
            <li></li>
            <li>
                <a  class="nav-link " href="" data-toggle="modal" data-target="#addPanelModal"><i class="far fa-file-alt"></i>&nbsp;Add Panel</a>
            </li>
            <li>
                    <a class="nav-link " href="" data-toggle="modal" data-target="#addProjectModal"><i class="fas fa-folder"></i>&nbsp;Add Project</a>
            </li>
            <li class="pointer">
                <div class="dropdown">
                    <a class="nav-link" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-cog"></i>&nbsp;Options
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a href="{{url($user->getUsername() . '/preview')}}" class="dropdown-item" href="" target="_blank"><i class="far fa-eye"></i>&nbsp;Preview Page</a>
                        <a class="dropdown-item" href="" data-toggle="modal" data-target="#userSettingsModal"><i class="fas fa-cog"></i>&nbsp;User Settings</a>
                    </div>
                  </div>
            </li>
   
          
            @endif
           
            @if( $user->isAuthenticated())
                <li>
                    <a class="nav-link" id="logout-btn" onclick="sendForm('logout-form', this);" href="#"><i class="fas fa-sign-out-alt"></i>&nbsp;Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
        </ul>
            @endif
        </nav>
    </div>
</nav>