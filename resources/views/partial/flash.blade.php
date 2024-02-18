@if(session()->has('flash_message'))
    <div class="alert alert-{{ session('flash_message_level') }} alert-dismissible" role="alert">
        {{ session('flash_message') }}
    </div>
@endif
