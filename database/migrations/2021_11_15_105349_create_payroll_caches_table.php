<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayrollCachesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payroll_caches', function (Blueprint $table) {
            $table->id();
            $table->string('StaffName');
            $table->string('StaffCode');
            $table->integer('NetSalary');
            $table->integer('GrossSalary');
            $table->integer('Deductions');
            $table->integer('Benefits');
            $table->string('MonthPaid');
            $table->string('CalendarYear');
            $table->string('RecordDate');
            $table->string('EmpID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payroll_caches');
    }
}
