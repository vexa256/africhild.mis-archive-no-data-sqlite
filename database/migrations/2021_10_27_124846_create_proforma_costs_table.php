<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProformaCostsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('proforma_costs', function (Blueprint $table) {
            $table->id();
            $table->string('ProfID');
            $table->string('Item');
            $table->string('SupID');
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
        Schema::dropIfExists('proforma_costs');
    }
}
