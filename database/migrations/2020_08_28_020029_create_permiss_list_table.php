<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('permiss_list'))
        {
        Schema::create('permiss_list', function (Blueprint $table) {
            $table->bigIncrements('PERMISS_LIST_ID');
            $table->string('PERMISS_LIST_USER')->nullable();
            $table->string('PERMISS_LIST_HO')->nullable();
            $table->string('PERMISS_LIST_ME')->nullable();
            $table->string('PERMISS_LIST_DELETE')->nullable();
            $table->string('PERMISS_LIST_EDIT')->nullable();
            $table->string('PERMISS_LIST_ADD')->nullable();
            $table->string('PERMISS_LIST_CLAIM')->nullable();
            $table->string('PERMISS_LIST_REPORT')->nullable();
            $table->dateTime('created_at', 0);
            $table->dateTime('updated_at', 0);
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permiss_list');
    }
}
