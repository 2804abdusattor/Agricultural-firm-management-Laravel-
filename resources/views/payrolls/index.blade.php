@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Зарплаты</h1>
    <a href="{{ route('payrolls.create') }}" class="btn btn-primary mb-3">Добавить зарплату</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Сотрудник</th>
                <th>Дата выплаты</th>
                <th>Сумма</th>
                <th>Налоги</th>
                <th>Бонусы</th>
                <th>Вычеты</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payrolls as $payroll)
            <tr>
                <td>{{ $payroll->id }}</td>
                <td>{{ $payroll->employee->first_name }} {{ $payroll->employee->last_name }}</td>
                <td>{{ $payroll->pay_date }}</td>
                <td>{{ $payroll->amount }}</td>
                <td>{{ $payroll->taxes }}</td>
                <td>{{ $payroll->bonuses }}</td>
                <td>{{ $payroll->deductions }}</td>
                <td>
                    <a href="{{ route('payrolls.edit', $payroll->id) }}" class="btn btn-warning">Редактировать</a>
                    <form action="{{ route('payrolls.destroy', $payroll->id) }}" method="POST" style="display:inline;">
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
