<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('permiss'))
        {
        Schema::create('permiss', function (Blueprint $table) {
            $table->bigIncrements('PERMISS_ID');
            $table->string('PERMISS_CODE')->nullable();
            $table->string('PERMISS_TEXT')->nullable();
            $table->string('PERMISS_TEXT_EN')->nullable();
            $table->string('PERMISS_STATUS')->nullable();
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
        Schema::dropIfExists('permiss');
    }
}
