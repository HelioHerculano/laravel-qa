@can('accept',$model)
    <a title="Mark this answer as best answer" 
        class="{{ $model->status }} mt-2"{{-- status is any acessor that i defined on model question --}}
        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $model->id }}').submit();"
        >
        <i class="fa-solid fa-check fa-2x"></i>
    </a>
    <form id="accept-answer-{{ $model->id }}" action="{{ route('answers.accept',$model->id) }}" method="post" style="display: none;">
        @csrf
    </form> 
    @else
    @if ($model->is_best){{-- is_best is any acessor that i defined on model answer --}}
        <a title="This answer was marked as best answer" 
        class="{{ $model->status }} mt-2">
        <i class="fa-solid fa-check fa-2x"></i>
        </a>
    @endif
@endcan