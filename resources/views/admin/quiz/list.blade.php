<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title" style="float: right">
                <a href="{{ route('quizzes.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                    Quiz
                    Oluştur</a>
            </h5>
            <form method="GET" action="" class="row mb-4">
                <div class="col-md-2">
                    <input type="text" name="title" value="{{ request()->get('title') }}" placeholder="Quiz Adı"
                        class="form-control" />
                </div>
                <div class="col-md-2">
                    <select name="status" onchange="this.form.submit()" class="form-control">
                        <option value="">Durum Seçiniz</option>
                        <option @if (request()->get('status') == 'publish') selected @endif value="publish">Aktif</option>
                        <option @if (request()->get('status') == 'passive') selected @endif value="passive">Pasif</option>
                        <option @if (request()->get('status') == 'draft') selected @endif value="draft">Taslak</option>
                    </select>
                </div>
                @if (request()->get('title') || request()->get('status'))
                    <div class="col-md-2">
                        <a href="{{ route('quizzes.index') }}" class="btn btn-secondary">Sıfırla</a>
                    </div>
                @endif
            </form>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Soru Sayısı</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Bitiş Tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->title }}</td>
                            <td>{{ $quiz->questions_count }}</td>
                            <td>
                                @switch($quiz->status)
                                    @case('publish')
                                        @if (!$quiz->finished_at)
                                            <span class="badge bg-success">Aktif</span>
                                        @elseif($quiz->finished_at>now())
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-info">Süresi Dolmuş</span>
                                        @endif
                                    @break
                                    @case('passive')
                                        <span class="badge bg-danger">Pasif</span>
                                    @break
                                    @case('draft')
                                        <span class="badge bg-warning">Taslak</span>
                                    @break

                                    @default

                                @endswitch
                            </td>
                            <td>
                                <span
                                    title="{{ $quiz->finished_at }}">{{ $quiz->finished_at ? $quiz->finished_at->diffForHumans() : '-' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('quizzes.details', $quiz->id) }}"
                                    class="btn btn-secondary btn-sm"><i class="fa fa-info-circle"></i></a>
                                <a href="{{ route('questions.index', $quiz->id) }}" class="btn btn-warning btn-sm"><i
                                        class="fa fa-question"></i></a>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-pen"></i></a>
                                <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-danger btn-sm"><i
                                        class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $quizzes->withQueryString()->links() }}
        </div>
    </div>
</x-app-layout>
