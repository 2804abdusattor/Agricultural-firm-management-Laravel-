@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Главная страница</h1>
        <p>Добро пожаловать в систему управления отдела кадров агрофирмы!</p>

        <div class="mt-4">
            <h2>Меню</h2>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="{{ route('employees.index') }}">Сотрудники</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('departments.index') }}">Департаменты</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('leaves.index') }}">Отпуски</a>
                </li>
                <li class="list-group-item">
                    <a href="{{ route('payrolls.index') }}">Зарплата</a>
                </li>
            </ul>
        </div>
    </div>
@endsection
