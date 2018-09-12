<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Sabercrafts</title>
</head>

<body>
    <nav class="bg-white shadow-sm">
        <div class="container">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Active</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
                @if( Auth::check() )
                <li class="nav-item">
                    <a class="nav-link" id="logout-btn" onclick="sendForm('logout-form');" href="#">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
                @endif
            </ul>
        </div>
    </nav>
    <main class="container mt-4">
        <div class="row">

            <section id="side" class=" col-md-4">

                <div id="about" class="shadow-sm bg-white pl-2">
                    <div class="profileImg">
                        <img src="https://picsum.photos/200/200/?random" alt="" class="d-block mx-auto rounded-circle">
                    </div>
                    <div class="text-center">
                        <h3>Saber</h3>
                        <h6>Full Stack Developer</h6>
                    </div>
                    <p>
                        I'm currently pursuing a Software engineering degree. I spend most of my free time learning new things and dabbling with
                        tools.
                    </p>


                </div>
                <button type="button" class="btn btn-success-outline">Contact me</button>
                <button type="button" class="btn btn-success-outline">Twitter</button>

            </section>

            <section id="center" class=" col-md-8 ">
                <div id="experience" class="component bg-white shadow-sm">
                    <h1>Experience</h1>
                    <ul>
                        <li>Linux</li>
                        <li>UML Modeling</li>
                        <li>Relational Databases: SQL</li>
                        <li>PHP and Frameworks (Laravel)</li>
                        <li>ES5/ES6 and Tools (Webpack, NPM...) </li>
                        <li>HTML5, CSS3, SCSS and Frameworks(Bootstrap, MaterializeCSS...)</li>
                        <li>Mobile First Responsive Web Design</li>
                        <li>C, C++ and JAVA</li>

                    </ul>
                </div>

                <div id="projects">

                    <div class="shadow-sm component bg-white mt-4">
                        <h1> Projects </h1>
                        <div>
                            Filters:
                            <select class="custom-select">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                  </select>
                        </div>
                    </div>

                    <div class="card-deck">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card shadow-sm">
                                    <div class="card-body ">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional
                                            content. This content is a little bit longer.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow-sm">
                                    <div class="card-body ">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card shadow-sm">
                                    <div class="card-body ">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
                                            content. This card has even longer content than the first to show that equal
                                            height action.</p>
                                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="experience" class="component bg-white shadow-sm">
                        <h1>Experience</h1>
                        <ul>
                            <li>Linux</li>
                            <li>UML Modeling</li>
                            <li>Relational Databases: SQL</li>
                            <li>PHP and Frameworks (Laravel)</li>
                            <li>ES5/ES6 and Tools (Webpack, NPM...) </li>
                            <li>HTML5, CSS3, SCSS and Frameworks(Bootstrap, MaterializeCSS...)</li>
                            <li>Mobile First Responsive Web Design</li>
                            <li>C, C++ and JAVA</li>
    
                        </ul>
                    </div>

        </div>
        </section>


        </div>

    </main>
    <footer class="text-center mt-5" style="height:200px;">
        Footer stuff
    </footer>
</body>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>

</html>