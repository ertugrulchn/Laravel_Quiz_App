<x-app-layout>
    <x-slot name="header">{{ $quiz->title }}</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="#">
                @foreach ($quiz->questions as $question)
                    @if ($question->image)
                        <img src="{{ asset($question->image) }}" alt="{{ $question->image }}"
                            class="img-responsive w-50 mb-2">
                    @endif
                    <strong>{{ $loop->iteration }})- {{ $question->question }}</strong>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}1" value="answer1" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}1">
                            A)- {{ $question->answer1 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}2" value="answer2" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}2">
                            B)- {{ $question->answer2 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}3" value="answer3" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}3">
                            C)- {{ $question->answer3 }}
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="{{ $question->id }}"
                            id="quiz{{ $question->id }}4" value="answer4" required>
                        <label class="form-check-label" for="quiz{{ $question->id }}4">
                            D)- {{ $question->answer2 }}
                        </label>
                    </div>
                    @if (!$loop->last)
                        <hr>
                    @endif
                @endforeach
                <button type="submit" class="btn btn-success btn-sm btn-block w-100 mt-3"><i class="fas fa-check"></i>
                    Sınavı Bitir</button>
            </form>
        </div>
    </div>
</x-app-layout>
