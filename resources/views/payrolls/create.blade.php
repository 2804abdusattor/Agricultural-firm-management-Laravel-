@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Добавить зарплату</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('payrolls.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="employee_id">Сотрудник</label>
            <select name="employee_id" id="employee_id" class="form-control" required>
                <option value="">Выберите сотрудника</option>
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}">{{ $employee->first_name }} {{ $employee->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="pay_date">Дата выплаты</label>
            <input type="date" name="pay_date" id="pay_date" class="form-control" value="{{ old('pay_date') }}" required>
        </div>

        <div class="form-group">
            <label for="amount">Сумма</label>
            <input type="number" name="amount" id="amount" class="form-control" value="{{ old('amount') }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="taxes">Налоги</label>
            <input type="number" name="taxes" id="taxes" class="form-control" value="{{ old('taxes') }}" step="0.01" required>
        </div>

        <div class="form-group">
            <label for="bonuses">Бонусы</label>
            <input type="number" name="bonuses" id="bonuses" class="form-control" value="{{ old('bonuses') }}" step="0.01">
        </div>

        <div class="form-group">
            <label for="deductions">Вычеты</label>
            <input type="number" name="deductions" id="deductions" class="form-control" value="{{ old('deductions') }}" step="0.01">
        </div>

        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
</div>
@endsection
