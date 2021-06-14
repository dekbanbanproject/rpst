<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagePicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('page_pictures'))
        {
        Schema::create('page_pictures', function (Blueprint $table) {
            $table->increments('picture_id',11);
            $table->string('picture_name',255)->nullable(); 
            $table->mediumText('picture_detail')->nullable();   
            $table->binary('picture')->nullable(); 
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
        Schema::dropIfExists('page_pictures');
    }
}
