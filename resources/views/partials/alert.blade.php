<!-- <div class="custom-alert alert alert-{{session('class') ?? 'primary'}}" role="alert">
    {{session('message')}}
</div> -->

<script>
    $(document).ready(function(){
        toastr.{{session('class')}}('{{session("message")}}');        
    })
</script>