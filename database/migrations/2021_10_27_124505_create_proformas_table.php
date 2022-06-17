<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProformasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('proformas', function (Blueprint $table) {
            $table->id();
            $table->string('ProfID');
            $table->string('Supplier');
            $table->string('SupID');
            $table->string('Description');
            $table->string('Notes');
            $table->string('VerifiedBy')->nullable()->default('NA');
            $table->string('AuthorizedBy')->nullable()->default('NA');
            $table->string('EDApprovalStatus')->default('pending');
            $table->string('EDEmpID')->nullable();
            $table->bigInteger('GrandTotal')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('proformas');
    }
}
