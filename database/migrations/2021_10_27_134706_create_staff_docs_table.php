<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffDocsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('staff_docs', function (Blueprint $table) {
            $table->id();
            $table->string('EmpID');
            $table->string('StaffName');
            $table->string('Department');
            $table->string('Designation');
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
        Schema::dropIfExists('staff_docs');
    }
}
