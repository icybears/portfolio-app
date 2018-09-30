@include('partials.head')
    
        @include('partials.nav')
        @if(session('message'))
            @include('partials.alert')
        @endif
    <main class="container mt-4">
        @yield('content')
    </main>
    <footer class="text-center mt-3" style="height:50px">
       
    </footer>
@include('partials.foot')

