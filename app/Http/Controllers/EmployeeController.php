<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\EmployeeController;

class EmployeeController extends Controller
{
    // Метод для отображения списка сотрудников
    public function index()
    {
        $employees = Employee::all(); // Получить всех сотрудников
        return view('employees.index', compact('employees')); // Передать их во view
    }

    // Метод для отображения формы создания нового сотрудника
    public function create()
    {
        return view('employees.create');
    }

    // Метод для сохранения нового сотрудника
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric',
            'date_of_birth' => 'required|date', // Добавьте это
        ]);

        Employee::create($validated);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully');
    }

    // Метод для отображения формы редактирования сотрудника
    public function edit($id)
    {
        $employee = Employee::findOrFail($id); // Найти сотрудника по ID
        return view('employees.edit', compact('employee')); // Передать сотрудника во view
    }

    // Метод для обновления информации о сотруднике
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'email' => 'required|email|unique:employees,email,' . $id,
        'phone' => 'required',
        'position' => 'required',
        'salary' => 'required|numeric',
        'date_of_birth' => 'required|date', // Добавьте это
    ]);

        $employee = Employee::findOrFail($id);
        $employee->update($validated); // Обновить информацию о сотруднике

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully');
    }

    // Метод для удаления сотрудника
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        $employee->delete(); // Удалить сотрудника

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully');
    }

}
