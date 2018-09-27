    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script> -->
    <script src="{{ asset('js/tagsInput.min.js') }}"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinysort/3.2.2/tinysort.min.js" ></script>    
    <script src="{{ asset('js/markdown.min.js') }}"></script>        
    <script src="{{ asset('js/bootstrap-markdown.min.js') }}"></script>    
    <script src="{{ asset('js/app.js') }}"></script>
    @if(auth()->check())
        @if(auth()->user()->isAuthenticated())
        
        <script>
        
            projectTag();

            @if( count(auth()->user()->projects) > 0 )
            
                setConfirmationModalInfo();
                
                @foreach($user->projects as $project)
                    projectTag({{ $project->getId() }});
                @endforeach

            @endif

            @if(count(auth()->user()->projects) > 1 )
                    layoutBreak();
            @endif
            

        </script>
            
        @endif
    @endif
</body>
</html>