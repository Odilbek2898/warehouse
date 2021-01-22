<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recalculations', function (Blueprint $table) {
            $table->id();
            $table->integer('kolichestvo');
            $table->integer('ostatok');

            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();

            $table->foreign('type_id')->references('id')->on('types');
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('recalculations');
    }
}
