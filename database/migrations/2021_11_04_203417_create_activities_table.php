<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('AID');
            $table->string('Activity')->nullable();
            $table->bigInteger('Budget')->nullable();
            $table->string('status')->nullable();
            $table->string('Grant')->nullable();
            $table->string('ProgressStatus')->default('ongoing');
            $table->date('StartDate')->nullable();
            $table->date('ActivityExpiry')->nullable();
            $table->bigInteger('ValidityMonths')->nullable();
            $table->text('StrategicObjectives')->nullable();
            $table->text('CriticalInformation')->nullable();
            $table->string('PID')->nullable();
            $table->string('DID')->nullable();
            $table->string('GID')->nullable();
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
        Schema::dropIfExists('activities');
    }
}
