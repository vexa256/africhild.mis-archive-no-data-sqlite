<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeneficiariesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('beneficiaries', function (Blueprint $table) {
            $table->id();
            $table->text('Description');
            $table->string('BID')->nullable();
            $table->string('BenID')->nullable();
            $table->string('Benefit')->nullable();
            $table->string('StaffName')->nullable();
            $table->string('EmpID')->nullable();
            $table->string('Name');
            $table->date('DateOfBirth');
            $table->string('IdType');
            $table->string('IdNumber');
            $table->string('Gender');
            $table->string('Relationship');
            $table->string('PhoneNumber');
            $table->string('CurrentAddress');
            $table->string('PermanentAddress');
            $table->string('Email')->default("NA");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('beneficiaries');
    }
}
