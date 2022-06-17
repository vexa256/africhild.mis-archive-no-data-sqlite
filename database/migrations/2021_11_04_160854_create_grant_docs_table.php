<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrantDocsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('grant_docs', function (Blueprint $table) {
            $table->id();
            $table->string('GID');
            $table->string('GrantName');
            $table->string('DocumentCategory');
            $table->string('DocumentTitle');
            $table->text('Description');
            $table->string('DocURL')->nullable();
            $table->string('DOCID');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('grant_docs');
    }
}
