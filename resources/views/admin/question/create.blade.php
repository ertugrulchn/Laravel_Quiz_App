<x-app-layout>
    <x-slot name="header">{{ $quiz->title }} İçin Soru Oluştur</x-slot>

    <div class="card">
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data" action="{{ route('questions.store', $quiz->id) }}">
                @csrf
                <div class="form-group mb-3">
                    <label class="text-uppercase">Soru<span class="text-danger">*</span></label>
                    <textarea name="question" class="form-control" rows="4">{{ old('question') }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label class="text-uppercase">Fotoğraf</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-uppercase">1. Cevap<span class="text-danger">*</span></label>
                            <textarea name="answer1" class="form-control" rows="2">{{ old('answer1') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-uppercase">2. Cevap<span class="text-danger">*</span></label>
                            <textarea name="answer2" class="form-control" rows="2">{{ old('answer2') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-uppercase">3. Cevap<span class="text-danger">*</span></label>
                            <textarea name="answer3" class="form-control" rows="2">{{ old('answer3') }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="text-uppercase">4. Cevap<span class="text-danger">*</span></label>
                            <textarea name="answer4" class="form-control" rows="2">{{ old('answer4') }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="text-uppercase">Doğru Cevap<span class="text-danger">*</span></label>
                    <select name="correct_answer" class="form-control">
                        <option @if (old('correct_answer') === 'answer1') selected @endif value="answer1">1. Cevap</option>
                        <option @if (old('correct_answer') === 'answer2') selected @endif value="answer2">2. Cevap</option>
                        <option @if (old('correct_answer') === 'answer3') selected @endif value="answer3">3. Cevap</option>
                        <option @if (old('correct_answer') === 'answer4') selected @endif value="answer4">4. Cevap</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-primary btn-sm btn-block w-100 text-uppercase">Soru
                        Oluştur</button>
                </div>
            </form>
            <p class="text-danger text-right">UYARI: * Sembolü İle Gösterilen Alanlar Zorunludur !</p>
        </div>
    </div>
</x-app-layout>
