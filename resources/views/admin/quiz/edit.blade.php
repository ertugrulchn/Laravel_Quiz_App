<x-app-layout>
    <x-slot name="header">Quiz Güncelle</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('quizzes.update', $quiz->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group m-3">
                    <label class="text-uppercase">Quiz Başlığı</label>
                    <input type="text" name="title" class="form-control" value="{{ $quiz->title }}" />
                </div>

                <div class="form-group m-3">
                    <label class="text-uppercase">Quiz Açıklaması</label>
                    <textarea name="description" class="form-control" rows="4">{{ $quiz->description }}</textarea>
                </div>

                <div class="form-check m-3">
                    <label for="isFinished" class="text-uppercase">Quiz Bitiş Tarihi Olacak Mı ?</label>
                    <input type="checkbox" @if ($quiz->finished_at) checked @endif class="form-check-input" id="isFinished" />
                </div>

                <div id="finishedInput" @if (!$quiz->finished_at)  style="display: none;" @endif class="form-group m-3">
                    <label class="text-uppercase">Quiz Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" @if ($quiz->finished_at)
                    value="{{ date('Y-m-d\TH:i', strtotime($quiz->finished_at)) }}" @endif class="form-control" />
                </div>

                <div class="form-group m-3">
                    <button type="submit" class="btn btn-primary btn-sm btn-block w-100 text-uppercase">Quiz
                        Güncelle</button>
                </div>
            </form>
        </div>
    </div>

    <x-slot name="js">
        <script>
            $('#isFinished').change(function() {
                if ($('#isFinished').is(':checked')) {
                    $('#finishedInput').show();
                } else {
                    $('#finishedInput').hide();
                }
            })
        </script>
    </x-slot>
</x-app-layout>
