<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeboardsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('noticeboards', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID')->nullable();
            $table->string('Subject');
            $table->string('SenderName');
            $table->string('HasAttachement');
            $table->string('Status')->nullable();
            $table->text('Description');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('noticeboards');
    }
}
