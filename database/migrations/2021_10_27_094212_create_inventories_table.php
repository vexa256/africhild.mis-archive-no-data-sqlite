<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('CategoryID')->nullable();
            $table->string('Item')->nullable();
            $table->text('Description')->nullable();
            $table->string('Units')->nullable();
            $table->string('ItemID')->nullable();
            $table->bigInteger('AvailableQty')->nullable();
            $table->bigInteger('WarningQty')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('inventories');
    }
}
