@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Редактировать отпуск</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('leaves.update', $leave->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee_id">Сотрудник</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $leave->employee_id == $employee->id ? 'selected' : '' }}>
                        {{ $employee->first_name }} {{ $employee->last_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_date">Начальная дата</label>
            <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $leave->start_date }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">Конечная дата</label>
            <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $leave->end_date }}" required>
        </div>

        <div class="form-group">
            <label for="type">Тип отпуска</label>
            <input type="text" name="type" class="form-control" id="type" value="{{ $leave->type }}" required>
        </div>

        <div class="form-group">
            <label for="reason">Причина</label>
            <textarea name="reason" class="form-control" id="reason">{{ $leave->reason }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
</div>
@endsection
