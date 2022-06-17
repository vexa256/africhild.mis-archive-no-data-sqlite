<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trackings', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('CatID');
            $table->string('Year')->nullable();
            $table->string('Month')->nullable();
            $table->string('ActID')->unique();
            $table->string('ActivityID');
            $table->date('StartDate');
            $table->date('EndDate');
            $table->string('Status');
            $table->string('Supervisor');
            $table->string('SupervisorComment')->nullable();
            $table->string('ActivityLocation');
            $table->bigInt('DurationInWeeks');
            $table->text('Description');
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
        Schema::dropIfExists('trackings');
    }
}