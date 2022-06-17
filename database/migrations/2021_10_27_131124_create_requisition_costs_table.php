<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequisitionCostsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('requisition_costs', function (Blueprint $table) {
            $table->id();
            $table->string('ReqID');
            $table->string('Item');
            $table->string('Description');
            $table->string('Unit');
            $table->string('Currency');
            $table->bigInteger('Qty');
            $table->bigInteger('UnitCost');
            $table->bigInteger('TotalValue');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('requisition_costs');
    }
}
