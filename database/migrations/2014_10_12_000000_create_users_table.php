<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->unsignedBigInteger('role_id')->default('2');
            $table->unsignedBigInteger('plan_id')->default('1');
            $table->string('image')->default('uploads/images/avatar.jpg');
//            $table->unsignedInteger('current_balance')->default(0);
            $table->decimal('current_balance')->default(0.00);
            $table->string('name');
            $table->string('real_name')->nullable();
            $table->string('invitation_code');

            $table->unsignedInteger('number');
            $table->string('invitation_code_verify')->nullable();



            $table->text('usdt_address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
