@extends('layouts.vertical', ['title' => 'View Test'])

@section('content')
<div class="container my-5">
    <h2 class="mb-4">{{ $test_name ?? '' }}</h2>

    @foreach($questions as $index => $question)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <h5 class="card-title">
                    Question {{ $index + 1 }}:
                    {{ $question->question_title }}
                </h5>

                @if($question->image)
                    <div class="mb-3">
                        <img src="{{ asset($question->image) }}" alt="Question Image" class="img-fluid rounded" style="max-height: 250px;">
                    </div>
                @endif

                <ul class="list-group">
                    @foreach($question->options as $option)
                        <li 
                            class="list-group-item 
                            {{ $option->is_correct ? 'list-group-item-success fw-bold' : '' }}">
                            {{ $option->option }}
                            @if($option->is_correct)
                                <span class="badge bg-success ms-2">Correct</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endforeach

</div>
@endsection
