<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivityCostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_costs', function (Blueprint $table) {
            $table->id();
            $table->string('DID');
            $table->string('GID');
            $table->string('AID');
            $table->string('CostID');
            $table->string('BroadCategory')->nullable();
            $table->string('Units')->nullable();
            $table->bigInteger('Frequency')->nullable();
            $table->bigInteger('QuantityRequired')->nullable();
            $table->bigInteger('UnitCost')->nullable();
            $table->bigInteger('Subtotal')->nullable();
            $table->string('Year')->nullable();
            $table->string('Month')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_costs');
    }
}
