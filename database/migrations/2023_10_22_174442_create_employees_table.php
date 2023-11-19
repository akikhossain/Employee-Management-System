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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name', 20);
            $table->string('employee_id', 12)->unique();
            $table->string('department', 12);
            $table->date('date_of_birth')->nullable();
            $table->string('designation', 30);
            $table->date('hire_date');
            $table->string('email', 30);
            $table->string('phone', 15);
            $table->string('salary', 8);
            $table->string('location', 30);
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
        Schema::dropIfExists('employees');
    }
};
