<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('image');
            $table->string('code',100)->unique();
            $table->string('name',100)->unique();
            $table->double('price',9,2);
            $table->unsignedBigInteger('size_id')->unique()->nullable();
            $table->string('brand',50)->nullable();
            $table->unsignedBigInteger('color_id')->unique()->nullable();
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
        Schema::dropIfExists('products');
    }
}
