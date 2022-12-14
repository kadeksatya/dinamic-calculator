<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->text('name');
            $table->text('title');
            $table->text('photo')->nullable();
            $table->text('sub_title');
            $table->text('sub_title_1')->nullable();
            $table->text('sub_title_2')->nullable();
            $table->text('code');
            $table->tinyInteger('is_deposito')->default(0);
            $table->tinyInteger('is_creadit_certificate')->default(0);
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
