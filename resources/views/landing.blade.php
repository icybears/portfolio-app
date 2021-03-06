
@include('partials.landing-head')

  <body class="text-center">
    <div class="bg-wrapper"></div>
    <div class="cover-container d-flex p-3 mx-auto flex-column">
      <header class="masthead mb-auto">
        <div class="inner">
          <h3 class="masthead-brand">Forewords</h3>
          <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link active" href="#">Home</a>
            <a class="nav-link" href="{{ route('login') }}">Login</a>
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </nav>
        </div>
      </header>

      <main role="main" class="inner cover">
        <h1 class="cover-heading">Forewords &ndash; Your online portfolio</h1>
        <p class="lead">Create a free online page to showcase your valuable skills and work.</p>
        <p class="lead">
          <a href="#demo" class="btn btn-lg btn-primary roundedBtn">Demonstration</a>
          <a id="createPage" href="{{ route('register') }}" class="btn btn-lg btn-light ml-2 mt-2 roundedBtn">Create Your Free Page Now</a>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p><strong>Copyright &copy; Sabercrafts 2018</strong>&nbsp;&mdash;&nbsp;<a href="mailto:sabercrafts@gmail.com">Contact us</a></p>
        </div>
      </footer>
    </div>
    <div id="demo" class="d-flex w-100 p-3 mx-auto flex-column">
      <h1 id="demoHeading">What It Looks Like</h1>
      <div id="carouselContainer" class="container">
          <div id="carousel" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li  data-target="#carousel" data-slide-to="0" class="active"></li>
                <li  data-target="#carousel" data-slide-to="1"></li>
                <li  data-target="#carousel" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="{{ asset('img/demo1.jpg') }}" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ asset('img/demo2.jpg') }}" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="{{ asset('img/demo3.jpg') }}" alt="Third slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span  class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span  class="sr-only">Next</span>
              </a>
            </div>
      </div>
    </div>
    
   
@include('partials.landing-foot')