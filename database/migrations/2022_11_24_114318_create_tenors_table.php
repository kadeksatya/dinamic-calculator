<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('name')->nullable();
            $table->text('code')->nullable();
            $table->tinyInteger('is_deposito')->default(0);
            $table->tinyInteger('is_creadit_certificate')->default(0);
            $table->double('rate_flat')->default(0);
            $table->double('rate_float')->default(0);
            $table->integer('total_tenor')->default(0);
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
        Schema::dropIfExists('tenors');
    }
}
