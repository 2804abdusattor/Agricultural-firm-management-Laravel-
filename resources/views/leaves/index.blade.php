@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Отпуска</h1>
    <a href="{{ route('leaves.create') }}" class="btn btn-primary">Добавить отпуск</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Сотрудник</th>
                <th>Начальная дата</th>
                <th>Конечная дата</th>
                <th>Тип</th>
                <th>Причина</th>
                <th>Статус</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($leaves as $leave)
            <tr>
                <td>{{ $leave->id }}</td>
                <td>{{ $leave->employee->first_name}} {{ $leave->employee->last_name}}</td>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ $leave->type }}</td>
                <td>{{ $leave->reason }}</td>
                <td>{{ $leave->approved ? 'Одобрен' : 'Не одобрен' }}</td>
                <td>
                    <a href="{{ route('leaves.edit', $leave->id) }}" class="btn btn-warning">Редактировать</a>
                    <form action="{{ route('leaves.destroy', $leave->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
