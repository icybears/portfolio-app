<nav class="bg-white shadow-sm">
    <div class="container">
        <ul class="nav">
            <a class="navbar-brand" href="#">Forewords</a>
                        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
            </button>
       
                
            <div class="row ml-auto"> 
            @if($user->isAuthenticated())
            <li class="nav-item">
                <a  class="nav-link " href="" data-toggle="modal" data-target="#addPanelModal">Add Panel&nbsp;<i class="far fa-file-alt"></i></a>
            </li>
            <li class="nav-item">
                    <a class="nav-link " href="" data-toggle="modal" data-target="#addProjectModal">Add Project&nbsp;<i class="fas fa-folder"></i></a>
            </li>

            @endif
           
            @if( Auth::check() )
            <li class="nav-item">
                <a class="nav-link" id="logout-btn" onclick="sendForm('logout-form', this);" href="#">Logout <i class="fas fa-sign-out-alt"></i></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @endif
        </ul>
    </div>
</nav>