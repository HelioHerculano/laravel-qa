<div class="media post">
    <div class="d-flex flex-column vote-controls">

        <x-shared.vote :model="$answer" label="answer"/>

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
                <x-shared.author :model="$answer" label="Answered"/>
            </div>
        </div>
    </div>
</div>