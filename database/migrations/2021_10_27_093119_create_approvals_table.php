<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApprovalsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('approvals', function (Blueprint $table) {
            $table->id();
            $table->string('ApprovalUniqueKey')->nullable();;
            $table->string('AprovalUniqueKeytable')->nullable();;
            $table->string('ApprovalUniqueKeyfield')->nullable();;
            $table->string('ApprovalSubject')->nullable();
            $table->string('ApprovalStatus')->default('pending');
            $table->string('ApproverEmpID')->nullable();
            $table->string('RequesterEmpID')->nullable();
            $table->string('DeclineMessage')->nullable();
            $table->string('ApprovalKeyID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('approvals');
    }
}
