@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Добавить сотрудника</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('employees.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">Имя</label>
                <input type="text" name="first_name" class="form-control" id="first_name" value="{{ old('first_name') }}" required>
            </div>

            <div class="form-group">
                <label for="last_name">Фамилия</label>
                <input type="text" name="last_name" class="form-control" id="last_name" value="{{ old('last_name') }}" required>
            </div>

            <div class="form-group">
                <label for="date_of_birth">Дата рождения</label>
                <input type="date" name="date_of_birth" class="form-control" id="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth ?? '') }}" required>
            </div>



            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label for="phone">Телефон</label>
                <input type="text" name="phone" class="form-control" id="phone" value="{{ old('phone') }}" required>
            </div>

            <div class="form-group">
                <label for="position">Должность</label>
                <input type="text" name="position" class="form-control" id="position" value="{{ old('position') }}" required>
            </div>

            <div class="form-group">
                <label for="salary">Зарплата</label>
                <input type="text" name="salary" class="form-control" id="salary" value="{{ old('salary') }}" required>
            </div>

            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
