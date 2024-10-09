<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    // Связь с таблицей leaves
    public function leaves()
    {
        return $this->hasMany(Leave::class); // Один сотрудник может иметь много отпусков
    }

    // Связь с таблицей payrolls
    public function payrolls()
    {
        return $this->hasMany(Payroll::class); // Один сотрудник может иметь много записей о зарплатах
    }
    // Добавляем поля, которые могут быть массово присвоены
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'position',
        'salary',
        'date_of_birth',
    ];
}
