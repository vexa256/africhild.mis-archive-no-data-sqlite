<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->id();

            $table->string('ContactPerson')->unique();
            $table->string('Contractor')->unique();
            $table->string('HOD')->default('false');
            $table->string('PhoneNumber')->unique();
            $table->string('Email')->unique();
            $table->string('PermanentAddress');
            $table->string('IdOrRegNumber');
            $table->string('IDScan')->nullable();
            $table->string('Nationality');
            $table->string('Expertise');
            $table->string('ServiceRendered');
            $table->text('Description');
            $table->string('Category')->nullable();
            $table->string('RoleID')->nullable();
            $table->string('ReportsTo')->nullable();
            $table->string('ReportsToRoleID')->nullable();
            $table->string('Department');
            $table->bigInteger('ProfessionalFees');
            $table->string('EmpID')->unique();
            $table->date('JoiningDate');
            $table->date('ContractExpiry');
            $table->string('BankName');
            $table->string('BankBranch');
            $table->string('AccountName');
            $table->bigInteger('AccountNumber')->unique();
            $table->bigInteger('MonthsToExpiry')->nullable();
            $table->string('TIN')->nullable()->unique();
            $table->string('StaffPhoto')->nullable();
            $table->string('PromotionStatus')->default('false');
            $table->string('RecordStatus')->default('Contract Active');
            $table->string('SoonExpiring')->default('false');
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
        Schema::dropIfExists('contractors');
    }
}
