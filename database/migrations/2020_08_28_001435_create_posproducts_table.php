<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('posproducts'))
        {

        Schema::create('posproducts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('strength')->nullable();
            $table->string('barcode')->unique();
            $table->binary('img')->nullable();
            $table->float('price',10,2);
            $table->float('pricecost',10,2);
            $table->string('did')->nullable();
            $table->text('company')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('posproducts');
    }
}
