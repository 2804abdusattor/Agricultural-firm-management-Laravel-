<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    protected $fillable = [
        'employee_id',
        'pay_date',
        'amount',
        'taxes',
        'bonuses',
        'deductions',
    ];

    // Связь с моделью Employee
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
