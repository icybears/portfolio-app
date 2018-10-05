
@include('partials.landing-head')

  <body class="text-center">
    <div class="bg-wrapper"></div>
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
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
          <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Create your page</a>
        </p>
      </main>

      <footer class="mastfoot mt-auto">
        <div class="inner">
          <p>Copyright &copy; Saber 2018 </p>
        </div>
      </footer>
    </div>

@include('partials.landing-foot')