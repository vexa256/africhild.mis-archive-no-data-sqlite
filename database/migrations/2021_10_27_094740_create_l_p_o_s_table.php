<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLPOSTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('l_p_o_s', function (Blueprint $table) {
            $table->id();
            $table->string('PurchaseOrderNo');
            $table->string('Supplier');
            $table->string('ProformaInvoiceNo');
            $table->date('ProformaInvoiceDate');
            $table->bigInteger('GrandTotal')->nullable();
            $table->date('Delivery');
            $table->string('LPOID');
            $table->string('VerifiedBy');
            $table->string('AuthorizedBy');
            $table->string('EDApprovalStatus')->default('pending');
            $table->string('EDEmpID')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('l_p_o_s');
    }
}
