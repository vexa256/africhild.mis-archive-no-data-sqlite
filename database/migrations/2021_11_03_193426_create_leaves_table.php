<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->string('LID');
            $table->string('StaffName');
            $table->string('LeaveCategory');
            $table->text('AppLetter');
            $table->bigInteger('DaysAppliedFor')->nullable();
            $table->bigInteger('AssignedDays')->nullable();
            $table->bigInteger('SpentDays')->nullable();
            $table->bigInteger('UnusedDays')->nullable();
            $table->string('ApproverEmpID')->nullable();
            $table->string('Approver')->nullable();
            $table->string('status')->nullable();
            $table->text('ApproverMessage')->nullable();
            $table->date('StartDate');
            $table->date('EndDate');
            $table->string('ApprovalStatus')->default('pending');
            $table->string('ValidityStatus')->default('pending');
            $table->string('EmpID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('leaves');
    }
}
