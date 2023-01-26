@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <div class="card-title">
                    <div class="d-flex align-items-center">
                        <h1>{{ $question->title }}</h1>
                        <div class="ml-auto">
                            <a href="{{ route('questions.index') }}" class="btn btn-outline-secondary">Back to all Questions</a>
                        </div>
                    </div>
                </div>

                <hr>
                   
                <div class="media">   

                    <x-shared.vote :model="$question" label="question"/>

                    <div class="media-body">
                        {!!$question->body_html!!}
                        <div class="row">
                            <div class="col-4"></div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <x-shared.author :model="$question" label="Asked"/>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-answers :question="$question"/>
    <x-answers.create :question="$question"/>
</div>

@endsection 