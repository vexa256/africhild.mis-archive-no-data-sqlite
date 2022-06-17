<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('requisitions', function (Blueprint $table) {
            $table->id();
            $table->string('ReqID');
            $table->string('Title');
            $table->text('CommentsAndObservations');
            $table->string('Department');
            $table->string('PreparedBy');
            $table->string('ReviewedBy');
            $table->string('ItemsRequiredByThisDate');
            $table->string('FundingSource');
            $table->string('JobCode');
            $table->string('EDEmpID');
            $table->string('HODEmpID');
            $table->string('FinanceEmpID');
            $table->string('GeneralApprovalStatus')->default('pending');
            $table->string('EdApprovalStatus')->default('pending');
            $table->string('HeadOfDepartmentApprovalStatus')->default('pending');
            $table->string('FianceApproval')->default('pending');
            $table->bigInteger('Amount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('requisitions');
    }
}
