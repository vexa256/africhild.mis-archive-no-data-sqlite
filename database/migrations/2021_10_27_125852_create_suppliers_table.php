<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuppliersTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();
            $table->string('SupplierName');
            $table->string('PhysicalAddress');
            $table->string('Category');
            $table->string('ServicesOrGoodsSupplied');
            $table->string('EmailOne')->unique();
            $table->string('EmailTwo')->unique();
            $table->string('SupID')->unique();
            $table->string('PhoneNumberOne')->unique();
            $table->string('PhoneNumberTwo')->unique();
            $table->string('VerifiedBy');
            $table->string('ApprovedBy');
            $table->string('PreparedBY');
            $table->string('EDApprovalStatus')->default('pending');
            $table->string('Website')->nullable();
            $table->text('Description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('suppliers');
    }
}
