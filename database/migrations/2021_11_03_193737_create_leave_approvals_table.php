<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveApprovalsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('leave_approvals', function (Blueprint $table) {
            $table->id();
            $table->string('LID');
            $table->string('EmpID')->nullable();
            $table->string('ApproverEmpID')->nullable();
            $table->string('Approver')->nullable();
            $table->string('status')->nullable();
            $table->text('ApproverMessage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('leave_approvals');
    }
}
