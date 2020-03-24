<?php

use Enum\UserRole;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id')->index();
            $table->string('first_name')->index();
            $table->string('last_name')->index();
            $table->string('email')->unique()->index();
            $table->string('login')->nullable()->unique()->index();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('CP')->nullable();
            $table->string('city')->nullable();
            $table->string('hiring_date')->nullable();
            $table->string('role')->default(UserRole::defaultValue())->index();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
