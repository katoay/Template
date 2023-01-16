@if (session()->has('success'))
    <div class="bg-green-100 border-l-4 rounded-r-md border-green-500 text-green-700 p-4" role="alert">
        <p class="font-bold">Success</p>
        <p>{{ session('success') }}</p>
    </div>

    {{-- <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="duration-700 close" data-dismiss="alert">
            <i class="fa fa-times"></i>exit
        </button>
        <strong>Success !</strong> {{ session('success') }}
    </div> --}}
@endif

@if (session()->has('error'))
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4" role="alert">
        <p class="font-bold">Error</p>
        <p>{{ session('error') }}</p>
    </div>
    {{-- <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert">
            <i class="fa fa-times"></i>exit
        </button>
        <strong>Error !</strong> 
    </div> --}}
@endif

<script>
    
</script>