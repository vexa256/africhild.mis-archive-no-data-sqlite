<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('PID')->unique();
            $table->string('DID');
            $table->string('GID');
            $table->string('Grant')->nullable();
            $table->string('Donor')->nullable();
            $table->string('ProjectName')->unique();
            $table->string('status')->default('valid');
            $table->bigInteger('ValidityMonths')->nullable();
            $table->text('DetailedNotes');
            $table->date('StartDate');
            $table->date('ProjectExpiry');
            $table->bigInteger('Budget');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('projects');
    }
}
