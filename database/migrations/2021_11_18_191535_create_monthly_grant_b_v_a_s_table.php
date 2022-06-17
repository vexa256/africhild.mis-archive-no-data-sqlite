<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonthlyGrantBVASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_grant_b_v_a_s', function (Blueprint $table) {
            $table->id();
            $table->string('GID')->nullable();
            $table->string('DID')->nullable();
            $table->string('Grant')->nullable();
            $table->string('Month')->nullable();
            $table->string('Year')->nullable();
            $table->string('Budget')->nullable();
            $table->string('Actual')->nullable();
            $table->string('Variance')->nullable();
            $table->string('BurnRate')->nullable();
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
        Schema::dropIfExists('monthly_grant_b_v_a_s');
    }
}
