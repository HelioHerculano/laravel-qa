<div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h2>{{ $question->answers_count ." ". Str::plural('Answer',$question->answers_count)}}</h2>
                    </div>
                    <hr>
                    <x-messages message="Success" type="success" />
                    @foreach($question->answers as $answer)
                        <div class="media">
                            <div class="d-flex flex-column vote-controls">
                                <a title="This answer is useful" class="vote-up">
                                <i class="fa-solid fa-caret-up fa-3x"></i>
                                </a>
                                <span class="votes-count">145</span>
                                <a title="This answer is not useful" class="vote-down off">
                                <i class="fa-solid fa-caret-down fa-3x"></i>
                                </a>
                                @can('accept',$answer)
                                    <a title="Mark this answer as best answer" 
                                        class="{{ $answer->status }} mt-2"
                                        onclick="event.preventDefault(); document.getElementById('accept-answer-{{ $answer->id }}').submit();"
                                        >
                                        <i class="fa-solid fa-check fa-2x"></i>
                                    </a>
                                    <form id="accept-answer-{{ $answer->id }}" action="{{ route('answers.accept',$answer->id) }}" method="post" style="display: none;">
                                        @csrf
                                    </form> 
                                    @else
                                    @if ($answer->is_best)
                                        <a title="Mark this answer as best answer" 
                                        class="{{ $answer->status }} mt-2">
                                        <i class="fa-solid fa-check fa-2x"></i>
                                        </a>
                                    @endif
                                @endcan
                            </div>
                            <div class="media-body">
                                {!! $answer->body_html !!}
                                <div class="row">
                                    <div class="col-4">
                                    <div class="ml-auto">
                                            {{--@if(Auth::user()->can('update-answer',$answer))--}}
                                            @can('update',$answer)
                                            <a href="{{route('questions.answers.edit',[$question->id,$answer->id])}}" class="btn btn-sm btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            {{--@endif--}}

                                            {{--@if(Auth::user()->can('delete-answer',$answer))--}}
                                            @can('delete',$answer)
                                            <form class="form-delete" action="{{route('questions.answers.destroy',[$question->id,$answer->id])}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are your sure?')"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                            @endcan
                                            {{--@endif--}}
                                        </div>
                                    </div>
                                    <div class="col-4"></div>
                                    <div class="col-4">
                                        <span class="text-muted">Answered {{ $answer->created_date }}</span>
                                        <div class="media mt-2">
                                            <a href="{{$answer->user->url}}" class="pr-2">
                                                <img src="{{$answer->user->avatar}}">
                                            </a>
                                            <div class="media-body mt-1">
                                                <a href="{{ $answer->user->url }}">{{ $answer->user->name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>