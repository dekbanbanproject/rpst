<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageSlidepicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('page_slidepictures'))
        {
        Schema::create('page_slidepictures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('filename'); 
            $table->enum('status', ['true', 'false'])->default('false'); 
            $table->timestamps();
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
        Schema::dropIfExists('page_slidepictures');
    }
}
