<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grants', function (Blueprint $table) {
            $table->id();
            $table->string('GrantName')->unique();
            $table->bigInteger('GrantAmountAlreadySpentInUgx')->nullable();
            $table->bigInteger('AvailableGrantAmountInUgx')->nullable();
            $table->string('GrantCategory');
            $table->bigInteger('OriginalAmount');
            $table->date('GrantExpiry');
            $table->date('GrantStartDate')->nullable();
            $table->string('status')->default('valid');
            $table->bigInteger('ValidityMonths')->nullable();
            $table->string('OriginalCurrency');
            $table->bigInteger('OriginalExchangeRate');
            $table->bigInteger('AmountInUgx');
            $table->string('GrantNumber')->unique();
            $table->string('GID')->unique();
            $table->string('DID');
            $table->string('Donor');
            $table->text('DetailedNotes');
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
        Schema::dropIfExists('grants');
    }
}
