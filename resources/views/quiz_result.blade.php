<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} | Sonucu</x-slot>

    <div class="card">
        <div class="card-body">
            <h4>Puan: <strong>{{ $quiz->my_result->point }}</strong></h4>
            <div class="alert alert-warning">
                <i class="fas fa-dot-circle"></i> İşaretlediğin Şık <br>
                <i class="fas fa-check text-success"></i> Doğru Cevap <br>
                <i class="fa fa-times text-danger"></i> Yanlış Cevap <br>
            </div>

            @foreach ($quiz->questions as $question)
                @if ($question->image)
                    <img src="{{ asset($question->image) }}" alt="{{ $question->image }}"
                        class="img-responsive w-50 mb-2">
                @endif
                @if ($question->correct_answer == $question->my_answer->answer)
                    <i class="fa fa-check text-success"></i>
                @else
                    <i class="fa fa-times text-danger"></i>
                @endif
                <strong>{{ $loop->iteration }})- {{ $question->question }}</strong>
                <br>
                <small class="text-dark">Bu Soruya <strong>%{{ $question->true_percent }}</strong> Oranında Doğru
                    Cevap Verildi</small>
                <div class="form-check mt-2">
                    @if ('answer1' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer1' == $question->my_answer->answer)
                        <i class="fas fa-dot-circle"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}1">
                        A)- {{ $question->answer1 }}
                    </label>
                </div>
                <div class="form-check">
                    @if ('answer2' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer2' == $question->my_answer->answer)
                        <i class="fas fa-dot-circle"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}2">
                        B)- {{ $question->answer2 }}
                    </label>
                </div>
                <div class="form-check">
                    @if ('answer3' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer3' == $question->my_answer->answer)
                        <i class="fas fa-dot-circle"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}3">
                        C)- {{ $question->answer3 }}
                    </label>
                </div>
                <div class="form-check">
                    @if ('answer4' == $question->correct_answer)
                        <i class="fa fa-check text-success"></i>
                    @elseif('answer4' == $question->my_answer->answer)
                        <i class="fas fa-dot-circle"></i>
                    @endif
                    <label class="form-check-label" for="quiz{{ $question->id }}4">
                        D)- {{ $question->answer2 }}
                    </label>
                </div>
                @if (!$loop->last)
                    <hr>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
