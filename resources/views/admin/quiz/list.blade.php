<x-app-layout>
    <x-slot name="header">Quizler</x-slot>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{ route('quizzes.create') }}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>
                    Quiz
                    Oluştur</a>
            </h5>
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th scope="col">Quiz</th>
                        <th scope="col">Durum</th>
                        <th scope="col">Bitiş Tarihi</th>
                        <th scope="col">İşlemler</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($quizzes as $quiz)
                        <tr>
                            <td>{{ $quiz->title }}</td>
                            <td>{{ $quiz->status }}</td>
                            <td>{{ $quiz->finished_at }}</td>
                            <td>
                                <a href="{{ route('quizzes.edit', $quiz->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-pen"></i></a>
                                <a href="{{ route('quizzes.destroy', $quiz->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $quizzes->links() }}
        </div>
    </div>
</x-app-layout>
