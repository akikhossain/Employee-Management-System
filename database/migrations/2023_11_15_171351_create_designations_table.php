<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designations', function (Blueprint $table) {
            $table->id();
            $table->string('designation_name', 20);
            $table->string('designation_id', 10);
            $table->unsignedBigInteger('salary_structure_id'); // Reference to salary_structures table
            $table->unsignedBigInteger('department_id'); // Assuming a department relationship
            $table->timestamps();

            // Indexes if needed
            $table->index('salary_structure_id');
            $table->index('department_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('designations');
    }
};
