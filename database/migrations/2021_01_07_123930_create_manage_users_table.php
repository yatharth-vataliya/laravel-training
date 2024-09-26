<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreateManageUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manage_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name');
            $table->string('user_email')->unique();
            $table->string('user_address')->nullable();
            $table->string('user_mobile');
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->date('date')->nullable()->default(Carbon::now()->format('Y-m-d'));
            $table->enum('status', ['active', 'inactive'])->default('active');
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
        Schema::dropIfExists('manage_users');
    }
}
