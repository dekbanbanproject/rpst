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
            $table->string('cid')->nullable();
            $table->string('name')->nullable();
            $table->string('lname')->nullable();
            $table->string('username');
            $table->string('position')->nullable();
            $table->string('dep',11)->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('QRpassword')->nullable();
            $table->binary('img')->nullable();
            $table->enum('status', ['true', 'false'])->default('false'); 
            $table->string('store_id')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linetoken')->nullable();
            $table->string('admin')->nullable();
            $table->string('read')->nullable();
            $table->string('write')->nullable();
            $table->string('print')->nullable();
            $table->string('user_add')->nullable();
            $table->string('user_edit')->nullable();
            $table->string('user_delete')->nullable();
            $table->string('user_medic')->nullable();
            $table->string('user_hos')->nullable();
            $table->string('user_claim')->nullable();
            $table->string('user_rep')->nullable();
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
