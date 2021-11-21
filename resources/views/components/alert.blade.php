@if ($message = Session::get('message') && $type = Session::get('type'))
    <div class="alert alert-{{$type}} my-4 alert-dismissible fade show" role="alert">
        {{$message}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
