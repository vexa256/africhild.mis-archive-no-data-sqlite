<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('From');
            $table->string('To');
            $table->string('ReceiverEmail');
            $table->string('Subject');
            $table->string('Message');
            $table->string('ReadStatus')->default('unread');
            $table->string('RecEmpID');
            $table->string('SenderEmpID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('notifications');
    }
}
