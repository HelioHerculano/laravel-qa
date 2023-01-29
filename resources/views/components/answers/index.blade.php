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
                        <x-answers.answer :answer="$answer"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>