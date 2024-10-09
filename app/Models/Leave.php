<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    // Связь с таблицей employees
    public function employee()
    {
        return $this->belongsTo(Employee::class); // Каждый отпуск принадлежит одному сотруднику
    }

    protected $fillable = [
        'employee_id', // Внешний ключ для связи с таблицей employees
        'start_date',
        'end_date',
        'type',
        'reason',
        'approved',
    ];
}
