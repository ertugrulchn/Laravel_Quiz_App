<x-app-layout>
    <x-slot name="header">Quiz Oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('quizzes.store') }}">
                @csrf
                <div class="form-group m-3">
                    <label class="text-uppercase">Quiz Başlığı <span class="text-danger">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" />
                </div>

                <div class="form-group m-3">
                    <label class="text-uppercase">Quiz Açıklaması</label>
                    <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
                </div>

                <div class="form-check m-3">
                    <label for="isFinished" class="text-uppercase">Quiz Bitiş Tarihi Olacak Mı ?</label>
                    <input type="checkbox" @if (old('finished_at')) checked @endif class="form-check-input" id="isFinished" />
                </div>

                <div id="finishedInput" @if (!old('finished_at')) style="display: none;" @endif class="form-group m-3">
                    <label class="text-uppercase">Quiz Bitiş Tarihi</label>
                    <input type="datetime-local" name="finished_at" value="{{ old('finished_at') }}"
                        class="form-control" />
                </div>

                <div class="form-group m-3">
                    <button type="submit" class="btn btn-primary btn-sm btn-block w-100 text-uppercase">Quiz
                        Oluştur</button>
                </div>
            </form>
            <p class="text-danger text-right">UYARI: * Sembolü İle Gösterilen Alanlar Zorunludur !</p>
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
