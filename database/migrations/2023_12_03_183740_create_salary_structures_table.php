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
        Schema::create('salary_structures', function (Blueprint $table) {
            $table->id();
            $table->string('salary_class');
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('mobile_allowance', 8, 2);
            $table->decimal('medical_expenses', 8, 2);
            $table->decimal('houseRent_allowance', 8, 2);
            $table->decimal('total_salary', 10, 2)->nullable();
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
        Schema::table('salary_structures', function (Blueprint $table) {
            $table->dropColumn('total_salary');
        });
    }
};
