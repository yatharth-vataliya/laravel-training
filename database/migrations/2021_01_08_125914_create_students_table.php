<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('student_name');
            $table->string('student_email')->unique();
            $table->date('student_birth_date');
            $table->string('student_mobile')->unique()->nullable();
            $table->string('student_stream');
            $table->string('student_address')->nullable();
            $table->string('student_profile_picture')->nullable();
            $table->enum('student_gender', ['female', 'male'])->nullable();
            $table->string('student_hobbies')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('students');
    }
}
