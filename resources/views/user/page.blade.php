@extends('layouts.main')

@section('content')

<div class="row">
       
                <section id="side" class=" col-md-4">
    
                   @include('user.partials.about')
                   
                   @include('user.partials.socials')
                </section>
                
                <section id="center" class=" col-md-8 ">
                   
                    <div>
                        <button type="button" class="btn btn-outline-dark btn-block" data-toggle="modal" data-target="#addPanelModal">NEW  PANEL</button>
                    </div>
                    @if(! empty($user->panels))
                        @foreach($user->panels as $panel)
                            <div class="component my-4 bg-white shadow-sm">

                               @include('user.partials.panel-dd')
                                    @include('modals.confirm-delete-panel')
                                    @include('modals.edit-panel')
                                    <h1>{{ $panel->getTitle() }}</h1>
                                    <div>
                                        {!! $panel->getParsedContent() !!}
                                    </div>
                            </div>
                        @endforeach
                    @endif
                    <div id="experience" class="component my-4 bg-white shadow-sm">
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
            @include('modals.add-panel')
@endsection
