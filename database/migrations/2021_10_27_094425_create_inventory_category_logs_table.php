<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryCategoryLogsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('inventory_category_logs', function (Blueprint $table) {
            $table->id();
            $table->string('CategoryID')->nullable();
            $table->string('Item')->nullable();
            $table->text('Description')->nullable();
            $table->string('Units')->nullable();
            $table->string('ItemID')->nullable();
            $table->bigInteger('AvailableQty')->nullable();
            $table->bigInteger('WarningQty')->nullable();
            $table->bigInteger('QtyDispensed')->nullable();
            $table->string('DispensedBy')->nullable();
            $table->string('DispensedTo')->nullable();
            $table->string('Explanation')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('inventory_category_logs');
    }
}
