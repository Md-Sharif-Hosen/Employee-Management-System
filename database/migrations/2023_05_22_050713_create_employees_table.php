<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
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
            $table->integer('roles_name')->nullable();
            $table->string('name',100)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('gender',100)->nullable();
            $table->string('email',100)->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->string('department_name',100)->nullable();
            $table->string('position',100)->nullable();
            $table->string('salary')->nullable();
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
}
