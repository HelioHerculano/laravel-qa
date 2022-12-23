<div>
@if(session('success'))
    <div class="alert alert-{{ $type }} alert-dismissible fade show" role="alert">
        <strong>{{ $message }}</strong> {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
</div>