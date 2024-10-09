@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать департамент</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('departments.update', $department->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Название</label>
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $department->name) }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" class="form-control" id="location" value="{{ old('location', $department->location) }}" placeholder="Enter location">
            </div>



            <button type="submit" class="btn btn-success">Сохранить</button>
        </form>
    </div>
@endsection
