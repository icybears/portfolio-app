    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('js/tagsInput.min.js') }}"></script>    
    <script src="{{ asset('js/app.js') }}"></script>
    @if(auth()->check())
        @if(auth()->user()->isAuthenticated())
        <script>
            @foreach($user->projects as $project)
                projectTag({{ $project->getId() }});
               
            @endforeach
        </script>
        @endif
    @endif
</body>
</html>