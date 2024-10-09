<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePayrollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payrolls', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employee_id'); // Внешний ключ для связи с таблицей employees
            $table->date('pay_date');
            $table->decimal('amount', 8, 2);
            $table->decimal('taxes', 8, 2);
            $table->decimal('bonuses', 8, 2)->default(0);
            $table->decimal('deductions', 8, 2)->default(0);
            $table->timestamps();

            // Связь с таблицей employees
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payrolls');
    }
}
